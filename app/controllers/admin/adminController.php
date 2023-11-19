<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;


class AdminController extends Controller
{
    public function __construct()
    {
         if(Guard::user()->role === 0){
            redirect('/');
        }
        parent::__construct();
    }

    public function index()
    {
        $user = User::where('role',0)->count();
        $product = Product::all()->count();
        $category = Category::all()->count();
        $order = Order::all()->count();
        $this->sendPage('/admin/dashboard',[
            'user'=> $user,
            'product'=> $product,
            'category'=> $category,
            'order'=> $order
        ]);   
    }
}