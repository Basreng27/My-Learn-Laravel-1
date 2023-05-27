<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt; //package untuk encrpy decrypt

use App\Bases\BaseServices;
use App\Models\User;

// use App\Models\Role;

class UsersService extends BaseServices
{
    // simpan data
    public static function store($request)
    {
        return DB::transaction(function () use ($request) {
            $model = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make(strtolower($request->password)),
                'user_id' => Crypt::encrypt($request->name),
            ]);

            return $model;
        });
    }
}
