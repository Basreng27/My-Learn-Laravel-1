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

        $GLOBALS['module'] = $this->module;
        $GLOBALS['pageTitle'] = $this->pageTitle;
        $GLOBALS['pageSubTitle'] = $this->pageSubTitle;
    }

    public function index()
    {
        return view('Pages.Menu.index');
    }
}
