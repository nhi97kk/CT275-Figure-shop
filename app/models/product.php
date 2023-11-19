<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    protected $table = "products";
    protected $fillable = ['name','desc','price','quantity','photo','category_id'] ;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public static function validate(array $data)
{
    $errors = [];

        if (!$data['name']) {
            $errors['name'] = 'Invalid name of product.';
        } 
        if (!$data['desc']) {
            $errors['desc'] = 'Invalid desc of product.';
        } 
        if (!$data['price']) {
            $errors['price'] = 'Invalid price of product.';
        } elseif($data['price'] < 1000){
            $errors['price'] = 'Price of product must higher than 1000';
        }
        if (!$data['quantity']) {
            $errors['quantity'] = 'Invalid quantity of product.';
        }elseif($data['quantity'] < 1){
            $errors['quantity'] = 'Quantity must > 0';
        }
        // if (!$data['photo']) {
        //     $errors['photo'] = 'Invalid photo of product.';
        // }
        

    return $errors;
}
}