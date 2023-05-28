<?php

namespace App\Http\Controllers;

use App\Bases\BaseModule;
use Illuminate\Http\Request;

class MenuController extends BaseModule
{
    public function __construct()
    {
        $this->module = 'Menu';
        $this->pageTitle = 'Menu';
        $this->pageSubTitle = 'Menu';
    }

    public function index()
    {
        return $this->serveView();
        // return view('Pages.Menu.index');
    }
}
