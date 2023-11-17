<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    protected $table = "categorys";
    protected $fillable = ['name','desc'] ;

    public static function validate(array $data)
    {
        $errors = [];

        if (!$data['name']) {
            $errors['name'] = 'Invalid name of category.';
        } 
        if (!$data['desc']) {
            $errors['desc'] = 'Invalid desc of category.';
        }        

        return $errors;
    }
}