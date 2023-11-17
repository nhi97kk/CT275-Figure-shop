<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        } else if(Guard::user()->role === 0){
            redirect('/');
        }
        parent::__construct();
    }

    public function index(){
        $products = Product::all();
        $categorys = Category::all();

        $this->sendPage('/admin/product/index', ['products'=>$products, 'categorys'=>$categorys] );
    }

    public function create()
    {
        $this->sendPage('/admin/product/create', [
            'errors' => session_get_once('errors'),
            'old' => $this->getSavedFormValues()
        ]);
    }

    public function store()
    {
        $data = $this->filterContactData($_POST);
        $model_errors = product::validate($data);
        $photo = handle_photo_upload();

        if (empty($model_errors)) {
            $product = new product();
            $product->fill([
                ...$_POST,
                'photo' => $photo ? $photo : ''
            ]);
            $product->save();
            redirect('/dashboard/product');
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/dashboard/product/create', ['errors' => $model_errors]);
    }

    protected function filterContactData(array $data)
    {
        return [
            'name' => $data['name'] ?? '',
            'desc' => $data['desc'] ?? '',
            'price' => $data['price'] ?? '',
            'quantity' => $data['quantity'] ?? '',
            'discount' => $data['discount'] ?? '',
            'photo' => $data['photo'] ?? '',
            'category_id' => $data['category_id'] ?? ''
        ];
    }

    public function edit($productId)
    {
        $product = product::findOrFail($productId);

        $form_values = $this->getSavedFormValues();
        $data = [
            'errors' => session_get_once('errors'),
            'product' => (!empty($form_values)) ?
                array_merge($form_values, ['id' => $product->id]) :
                $product->toArray()

        ];
        $this->sendPage('/admin/product/edit', $data);
    }

    public function update($productId)
    {
        $product = product::findOrFail($productId);
        if (!$product) {
            $this->sendNotFound();
        }
        $data = $this->filterContactData($_POST);
        $photo = handle_photo_upload();
        $oldphoto = $_POST['old-photo'];
        $model_errors = product::validate($data);
        if (empty($model_errors)) {
            $product->fill([
                ...$_POST,
                'photo' => $photo ? $photo : $oldphoto
            ]);
            $product->save();

            if ($photo && $oldphoto) {
                remove_photo_file($oldphoto);
            }

            redirect('/dashboard/product');
        }
        $this->saveFormValues($_POST);
        redirect('/dashboard/product/edit/' . $productId, [
            'errors' => $model_errors
        ]);
    }

    public function destroy($productId)
    {
        $product = product::findOrFail($productId);
        if (!$product) {
            $this->sendNotFound();
        }
 
        remove_photo_file($product->photo);
        $product->delete();
        
        redirect('/dashboard/product');
    }
}