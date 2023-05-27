<?php

namespace App\Http\Controllers;

use App\Bases\BaseModule;
use App\Models\User;
use App\Services\UsersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Authenticatable;

class AuthController extends BaseModule
{
    public function __construct()
    {
        $this->module = 'Auth';
        $this->pageTitle = 'Login';
        $this->pageSubTitle = 'Login';

        $GLOBALS['module'] = $this->module;
        $GLOBALS['pageTitle'] = $this->pageTitle;
        $GLOBALS['pageSubTitle'] = $this->pageSubTitle;
    }

    public function index()
    {
        return view('Auth.login');
    }

    public function regist()
    {
        return view('Auth.regist');
    }

    public function processRegist(Request $request)
    {
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
            return $this->serveJSON($validator->errors());

        $result = UsersService::store($request);

        return $this->serveJSON($result);
    }

    public function processLogin(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',
            ]
        );

        if ($validator->fails())
            return $this->serveJSON($validator->errors());

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check(strtolower($credentials['password']), $user->password)) {
            Auth::login($user);

            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->withInput()->withErrors(['Login gagal. Pastikan email dan password benar.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
