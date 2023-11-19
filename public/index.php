<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../bootstrap.php';

define('APPNAME', 'MyFigure');

session_start();

$router = new \Bramus\Router\Router();

// Auth routes
$router->post('/logout', '\App\Controllers\Auth\LoginController@destroy');
$router->get('/register', '\App\Controllers\Auth\RegisterController@create');
$router->post('/register', '\\App\Controllers\Auth\RegisterController@store');
$router->get('/login', '\App\Controllers\Auth\LoginController@create');
$router->post('/login', '\App\Controllers\Auth\LoginController@store');

//Admin routes
$router->get('/dashboard', '\App\Controllers\Admin\AdminController@index');
    //category
    $router->get('/dashboard/category', '\App\Controllers\Admin\CategoryController@index');
    $router->get('/dashboard/category/create', '\App\Controllers\Admin\CategoryController@create');
    $router->post('/dashboard/category', '\App\Controllers\Admin\CategoryController@store');
    $router->get('/dashboard/category/edit/(\d+)','\App\Controllers\Admin\CategoryController@edit');
    $router->post('/dashboard/category/(\d+)','\App\Controllers\Admin\CategoryController@update');
    $router->post('/dashboard/category/delete/(\d+)','\App\Controllers\Admin\CategoryController@destroy');
    //product
    $router->get('/dashboard/product', '\App\Controllers\Admin\ProductController@index');
    $router->get('/dashboard/product/create', '\App\Controllers\Admin\ProductController@create');
    $router->post('/dashboard/product', '\App\Controllers\Admin\ProductController@store');
    $router->get('/dashboard/product/edit/(\d+)','\App\Controllers\Admin\ProductController@edit');
    $router->post('/dashboard/product/(\d+)','\App\Controllers\Admin\ProductController@update');
    $router->post('/dashboard/product/delete/(\d+)','\App\Controllers\Admin\ProductController@destroy');
    //user
    $router->get('/dashboard/user', '\App\Controllers\Admin\UserController@index');
    //Admin changePass
    $router->get('/dashboard/change-password','\App\Controllers\Admin\InfoController@change');
    $router->post('/dashboard/change-password','\App\Controllers\Admin\InfoController@store');
    $router->get('/dashboard/change-password/success','\App\Controllers\Admin\InfoController@success');
    //order
    $router->get('/dashboard/order', '\App\Controllers\Admin\OrderController@index');
    $router->get('/dashboard/order/(\d+)', '\App\Controllers\Admin\OrderController@view');

// User routes
$router->get('/', '\App\Controllers\User\UserController@index');
    //product
    $router->get('/product', '\App\Controllers\User\ProductController@index');
    $router->get('/product/(\d+)', '\App\Controllers\User\ProductController@detail');
    $router->post('/product/(\d+)', '\App\Controllers\User\ProductController@add');

    //cart
    $router->get('/cart', '\App\Controllers\User\CartController@index');
    $router->post('/cart/minus', '\App\Controllers\User\CartController@minus');
    $router->post('/cart/plus', '\App\Controllers\User\CartController@plus');
    $router->post('/cart/delete/(\d+)', '\App\Controllers\User\CartController@destroy');
    //order
    $router->get('/order/create', '\App\Controllers\User\OrderController@create');
    $router->post('/order', '\App\Controllers\User\OrderController@store');
    $router->get('/order', '\App\Controllers\User\OrderController@index');



$router->set404('\App\Controllers\Controller@sendNotFound');

$router->run();