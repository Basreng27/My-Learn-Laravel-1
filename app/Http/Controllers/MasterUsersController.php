<?php

namespace App\Http\Controllers;

use App\Bases\BaseModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Services\MasterUsersService as Service;
use Illuminate\Validation\Rule;

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

    public function edit($id)
    {
        $data = Service::get(decrypt($id));

        return $this->serveView([
            'data' => $data
        ], 'form');
    }

    public function update(Request $request)
    {
        // Check Validation
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => ['required', Rule::unique('users')->whereNull('deleted_at')],
                'password' => 'required',
            ],
            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.unique' => 'Email already exists',
                'password.required' => 'Password is required',
            ]
        );

        if ($validator->fails())
            return $this->serveValidations($validator->errors());

        $result = Service::update($request->id, $request);

        return $this->serveJSON($result);
    }

    public function destroy($id)
    {
        $result = Service::destroy(decrypt($id));

        return $this->serveJSON($result);
    }
}
