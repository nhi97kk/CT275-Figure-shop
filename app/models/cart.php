<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model{
    protected $table = "carts";
    protected $fillable = ['user_id','product_id','quantity'];

    public static function validate(array $data)
    {
        $status = [];
        if(empty($data['user_id'])){
            $status['null'] = 'null';
            return $status;
        }

        $exist = Cart::where('user_id', $data['user_id'])->where('product_id', $data['product_id'])->where('order_id', 0)->first();

        $product = Product::findOrFail($data['product_id']);

        if (!isset($exist)) {
            $status = [];
        }elseif($exist->quantity + $data['quantity'] <= $product->quantity){
            $status['none'] = 'none';
        }else{
            $status['error']= 'Không thể thêm nhiều sản phẩm vào giỏ hàng hơn kho!';
        }

        return $status;
    }
}