<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as DB;

class InfoController extends Controller{
    public function __construct()
    {
        if(Guard::user()->role === 0) {
            redirect('/');}

        parent::__construct();
    }

    public function change(){
        $data = [
            'old' => $this->getSavedFormValues(),
            'errors' => session_get_once('errors')
        ];

        $this->sendPage('/admin/changePass', $data);
    }

    public function store()
{
    $this->saveFormValues($_POST, ['password', 'password_confirmation']);

    $data = $this->filterUserData($_POST);

    try {
        DB::beginTransaction();

        $model_errors = user::validateChange($data);
        if (empty($model_errors)) {
            // Dữ liệu hợp lệ...
            $this->changePass($data);

            DB::commit();
        } else {
            // Dữ liệu không hợp lệ...
            redirect('/dashboard/change-password', ['errors' => $model_errors]);
        }
    } catch (\Exception $e) {
        DB::rollBack();
    }

    // Tiếp tục xử lý hoặc chuyển hướng
}

    protected function filterUserData(array $data)
    {
        return [
            'password' => $data['password'] ?? null,
            'password_confirmation' => $data['password_confirmation'] ?? null
        ];
    }

    protected function changePass($data)
    {
       $password = password_hash($data['password'], PASSWORD_DEFAULT);
       $user = Guard::user();
       $user->password = $password;
       $user->save();
       redirect('/dashboard/change-password/success');     
    }

    public function success(){
        $this->sendPage('admin/success');
    }
}