<?php

namespace App\Http\Controllers;

use App\Bases\BaseModule;

class DashboardController extends BaseModule
{
    public function __construct()
    {
        $this->module = 'Dashboard';
        $this->pageTitle = 'Dashboard';
        $this->pageSubTitle = 'Dashboard';

        $GLOBALS['module'] = $this->module;
        $GLOBALS['pageTitle'] = $this->pageTitle;
        $GLOBALS['pageSubTitle'] = $this->pageSubTitle;
    }

    public function index()
    {
        return $this->serveView();
    }
}
