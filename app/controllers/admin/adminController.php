<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        } else if(Guard::user()->role === 0){
            redirect('/');
        }
        parent::__construct();
    }

    public function index()
    {
        $this->sendPage('/admin/dashboard');   
    }
}