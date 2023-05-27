<?php

namespace App\Http\Controllers;

use App\Bases\BaseModule;

class AuthController extends BaseModule
{
    public function __construct()
    {
        $this->module = 'Auth';
        $this->pageTitle = 'Login';
        $this->pageSubTitle = 'Login';
    }

    public function index()
    {
        return view('Auth.login');
    }
}
