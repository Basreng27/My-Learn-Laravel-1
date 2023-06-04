<?php

namespace App\Http\Controllers;

use App\Bases\BaseModule;
use Illuminate\Http\Request;

use App\Services\MasterUsersService as Service;

class MasterUsersController extends BaseModule
{
    public function __construct()
    {
        $this->module = 'MasterUsers';
        $this->pageTitle = 'Master Users';
        $this->pageSubTitle = 'Master Users';
    }

    public function index()
    {
        return $this->serveView();
    }

    public function data(Request $request)
    {
        $result = Service::data($request);

        return $this->serveJSON($result);
    }

    public function store(Request $request)
    {
        $result = Service::store($request);

        return $this->serveJSON($result);
    }
}
