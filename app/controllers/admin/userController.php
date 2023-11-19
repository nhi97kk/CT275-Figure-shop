<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\User;

class UserController extends Controller{
    public function __construct()
    {
         if(Guard::user()->role === 0){
            redirect('/');
        }
        parent::__construct();
    }

    public function index(){
        $users = User::where('role',0)->get();
        $this->sendPage('/admin/user/index', ['users'=>$users]);
    }
}

