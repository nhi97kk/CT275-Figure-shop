<?php

namespace App\Controllers\User;

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
        if(Guard::isUserLoggedIn() && Guard::user()->role === 1){
            redirect('/dashboard');
        }
        parent::__construct();
    }

    public function create(){
        $user = Guard::user();
        $carts = Cart::where('user_id',$user->id)->get();

        $this->sendPage('/user/info',[
            'carts' => $carts,
            'errors' => session_get_once('errors'),
            'old' => $this->getSavedFormValues()
        ]);
    }

    public function store(){
        $data = $this->filterData($_POST);
        $model_errors = Order::validate($data);
        $user = Guard::user();
        if (empty($model_errors)) {

            $data['user_id'] = $user->id;
            $order = new order();
            $order->fill($data);  
            $order->save();

            $carts = Cart::where('user_id',$user->id)->where('order_id', 0)->get();

            foreach ($carts as $cart) {
                $cart->order_id = $order->id;
                $cart->save();

                $product = Product::findOrfail($cart->product_id);
                $product->quantity -= $cart->quantity;
                $product->save();
            }

            redirect('/order');
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/order/create', ['errors' => $model_errors]);
    }

    protected function filterData(array $data)
    {
        return [
            'total' => $data['total'] ?? 0,
            'name' => $data['name'] ?? '',
            'address' => $data['address'] ?? '',
            'phone' => preg_replace('/\D+/', '', $data['phone'])
        ];
    }

    public function index(){
        $user = Guard::user();
        $orders = Order::where('user_id',$user->id)->get();

        $this->sendPage('/user/order',
                ['orders'=>$orders,
                'user'=>$user]);
    }
    
}