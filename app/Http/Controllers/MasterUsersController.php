<?php

namespace App\Http\Controllers;

use App\Bases\BaseModule;
use Illuminate\Http\Request;

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
}
