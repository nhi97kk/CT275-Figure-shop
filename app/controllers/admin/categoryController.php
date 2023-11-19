<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\User;
use App\Models\Category;

class CategoryController extends Controller{
    public function __construct()
    {
         if(Guard::user()->role === 0){
            redirect('/');
        }
        parent::__construct();
    }

    public function index(){
        $categorys = Category::all();
        $this->sendPage('/admin/category/index',['categorys'=>$categorys] );
    }

    public function create()
    {
        $this->sendPage('/admin/category/create', [
            'errors' => session_get_once('errors'),
            'old' => $this->getSavedFormValues()
        ]);
    }

    public function store()
    {
        $data = $this->filterContactData($_POST);
        $model_errors = category::validate($data);
        if (empty($model_errors)) {
            $category = new category();
            $category->fill($data);
            $category->save();
            redirect('/dashboard/category');
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/dashboard/category/create', ['errors' => $model_errors]);
    }

    protected function filterContactData(array $data)
    {
        return [
            'name' => $data['name'] ?? '',
            'desc' => $data['desc'] ?? ''
        ];
    }

    public function edit($categoryId)
    {
        $category = category::findOrFail($categoryId);

        $form_values = $this->getSavedFormValues();
        $data = [
            'errors' => session_get_once('errors'),
            'category' => (!empty($form_values)) ?
                array_merge($form_values, ['id' => $category->id]) :
                $category->toArray()

        ];
        $this->sendPage('/admin/category/edit', $data);
    }

    public function update($categoryId)
    {
        $category = category::findOrFail($categoryId);
        if (!$category) {
            $this->sendNotFound();
        }
        $data = $this->filterContactData($_POST);
        $model_errors = category::validate($data);
        if (empty($model_errors)) {
            $category->fill($data);
            $category->save();
            redirect('/dashboard/category');
        }
        $this->saveFormValues($_POST);
        redirect('/dashboard/category/edit/' . $categoryId, [
            'errors' => $model_errors
        ]);
    }

    public function destroy($categoryId)
    {
        $category = category::findOrFail($categoryId);
        if (!$category) {
            $this->sendNotFound();
        }
        $category->delete();
        redirect('/dashboard/category');
    }
}