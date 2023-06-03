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

    public function data(Request $request)
    {
        $result = Service::data($request);

        return $this->serveJSON($result);
    }

    public function dataChild($id)
    {
        $result = Service::dataChild($id);

        return $this->serveJSON($result);
    }

    public function store(Request $request)
    {
        $result = Service::store($request);

        return $this->serveJSON($result);
    }

    public function oneData(Request $request)
    {
        echo '<pre>' . print_r(111, true);
        exit(1);
        $result = Service::store($request);

        return $this->serveJSON($result);
    }
}
