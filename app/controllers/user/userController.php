<?php

namespace App\Controllers\User;

use App\Models\User;
use App\Controllers\Controller;
use App\SessionGuard as Guard;

class UserController extends Controller
{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        } else if(Guard::user()->role === 1){
            redirect('/dashboard');
        }
        parent::__construct();
    }
    public function index()
    {

        $this->sendPage('/user/home');
    }
}