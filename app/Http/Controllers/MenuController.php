<?php

namespace App\Http\Controllers;

use App\Bases\BaseModule;
use Illuminate\Http\Request;
use App\Services\MenuService as Service;

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
        return $this->serveView([
            'routes' => Service::getRoutesAdmin('Select')
        ]);
    }
}