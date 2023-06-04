<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

use App\Bases\BaseServices;
use App\Models\User as Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class MasterUsersService extends BaseServices
{
    public static function get($id = null)
    {
        $result = null;

        if ($id == null)
            $result = Model::all();
        else
            $result = Model::find($id);

        return $result;
    }

    public static function data($request)
    {
        // $query = Model::orderBy('name')->data();
        $query = Model::orderBy('name')->get();

        return DataTables::of($query)
            ->filter(function ($query) use ($request) {

                // if (!empty($request->name))
                //     $query->whereLike('name', $request->name);
            })
            ->addIndexColumn()
            ->addColumn('id', function ($query) {
                return encrypt($query->id);
            })
            ->addColumn('checkbox', function ($query) {
                return true;
            })
            ->make(true)
            ->getData(true);
    }

    public static function store($request)
    {
        return DB::transaction(function () use ($request) {
            return Model::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make(strtolower($request->password)),
                'user_id' => Crypt::encrypt($request->name),
            ]);
        });
    }

    public static function update($id, $request)
    {
        return DB::transaction(function () use ($id, $request) {
            $model = Model::find($id);

            if (!$model) {
                return null; // Handle jika model tidak ditemukan
            }

            $model->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            return $model;
        });
    }

    public static function destroy($id)
    {
        return Model::find($id)->delete();
    }
}
