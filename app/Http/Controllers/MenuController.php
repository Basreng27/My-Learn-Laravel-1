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

    public function create(Request $request)
    {
        // return view('Pages.Menu.form');
        // $listPermissionName = getListPermissionName();
        // $listPermissionName = array_merge(['' => 'Pilih'], $listPermissionName);

        return $this->serveView([
            // 'parent_id'   => !empty($request->parent_id) ? $request->parent_id : '',
            // 'routes'      => Service::getRoutesAdmin(__('Pilih')),
            // 'permissions' => $listPermissionName,
        ], 'form');
    }
}
