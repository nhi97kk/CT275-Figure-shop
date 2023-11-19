<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use App\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\SessionGuard as Guard;

class OrderController extends Controller{
    public function __construct()
    {
         if(Guard::user()->role === 0){
            redirect('/');
        }
        parent::__construct();
    }

    public function index(){
        $orders = Order::all();
        $this->sendPage('/admin/order/index',['orders'=>$orders] );
    }

    public function view($orderId){

        $order = Order::findOrfail($orderId);
        $carts = Cart::where('order_id',$order->id)->get();
        $this->sendPage('/admin/order/view',['carts'=>$carts,
        'order'=>$order] );
    }
}