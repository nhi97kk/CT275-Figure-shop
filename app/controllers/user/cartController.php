<?php

namespace App\Controllers\User;

use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use App\Controllers\Controller;
use App\Models\Product;
use App\SessionGuard as Guard;

class CartController extends Controller{
    public function __construct()
    {
        if(Guard::isUserLoggedIn() && Guard::user()->role === 1){
            redirect('/dashboard');
        }
        parent::__construct();
    }

    public function index(){
        $user = Guard::user();
        $carts = Cart::where('user_id',$user->id)->where('order_id', 0)->get();

        $this->sendPage('/user/cart',['carts'=>$carts]);
    }

    public function minus(){
        $cartId = $_POST['cartId'];
        $cart = Cart::findOrfail($cartId);
        if($cart->quantity > 1){
            $cart->quantity = $cart->quantity - 1;
        }
        $cart->save();
        redirect('/cart');
    }

    public function plus(){
        $cartId = $_POST['cartId'];
        $cart = Cart::findOrfail($cartId);
        $product = Product::where('id',$cart->product_id)->first();
        if($cart->quantity < $product->quantity){
            $cart->quantity += 1;
            $cart->save();
        }
        redirect('/cart');
    }

    public function destroy($cartId){
        $cart = Cart::findOrfail($cartId);
        $cart->delete();
        redirect('/cart');
    }

}