<?php

namespace App\Controllers\User;

use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use App\Controllers\Controller;
use App\Models\Product;
use App\SessionGuard as Guard;

class ProductController extends Controller{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        } else if(Guard::user()->role === 1){
            redirect('/dashboard');
        }
        parent::__construct();
    }

    public function index(){
        $products = Product::all();
        $categorys = Category::all();
        $this->sendPage('/user/product', ['products'=>$products,
                                          'categorys'=>$categorys  ]); 
    }

    public function detail($productId){
        $product = Product::findOrFail($productId);
        $this->sendPage('/user/detail', ['product'=>$product, 'status' => session_get_once('status')]) ;
    }

    public function add(){
        

        $data = $this->filterData($_POST);
        $status = Cart::validate($data);

        $exist = Cart::where('user_id', $data['user_id'])->where('product_id', $data['product_id'])->first();

        $product = Product::findOrFail($data['product_id']);

        if(empty($status)){
            $cart = new Cart();
            $cart->fill($data);    
            $cart->save();
            $status['none'] = 'none';
        }elseif($exist->quantity + $data['quantity'] <= $product->quantity){
            $exist->quantity += $data['quantity'];
            $exist->save();           
        }
        redirect('/product/' . $data['product_id'], ['status'=> $status]);
    }

    protected function filterData(array $data)
    {
        return [
            'product_id' => $data['product_id'] ?? '',
            'user_id' => $data['user_id'] ?? '',
            'quantity' => $data['quantity'] ?? ''
        ];
    }
}