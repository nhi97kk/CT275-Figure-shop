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



// User routes
$router->get('/', '\App\Controllers\User\UserController@index');

$router->set404('\App\Controllers\Controller@sendNotFound');

$router->run();