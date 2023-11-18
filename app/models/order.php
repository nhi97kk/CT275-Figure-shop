<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    protected $table = "orders";
    protected $fillable = ['user_id','name','address','phone'] ;

    public static function validate(array $data){
        $errors = [];

        if (!$data['name']) {
            $errors['name'] = 'Full name is required.';
        }
        $validPhone = preg_match(
            '/^(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b$/',
            $data['phone']
        );
        if (!$validPhone) {
            $errors['phone'] = 'Invalid phone number.';
        }
        
        if (!$data['address']) {
            $errors['address'] = 'Address is required.';
        }

        return $errors;
    }
}