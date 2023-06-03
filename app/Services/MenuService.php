<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt; //package untuk encrpy decrypt

use App\Bases\BaseServices;
use Illuminate\Support\Facades\Route;
// use App\Models\Menu as Model;
use App\Models\Menu as model;

class MenuService extends BaseServices
{
    public static function data($data)
    {
        $cursors = Model::orderBy('sequence')->get();
        $menus = [];

        foreach ($cursors as $cursor) {
            $parent_id = !empty($cursor->parent_id) ? $cursor->parent_id : 0;
            $menus[$parent_id][] = $cursor;
        }

        $results = count($menus) > 0 ? self::parsingMenu($menus) : [];

        return self::outputResult($results);
    }

    public static function dataChild($id)
    {
        $cursors = Model::where('parent_id', decrypt($id))->orderBy('sequence')->get();

        $menus = [];

        foreach ($cursors as $cursor) {
            $parent_id = !empty($cursor->parent_id) ? $cursor->parent_id : 0;
            $menus[$parent_id][] = $cursor;
        }

        $results = count($menus) > 0 ? self::parsingChildMenu($menus, $parent_id) : [];

        return self::outputResult($results);
    }

    public static function parsingChildMenu($menus, $parent_id = 0, $route = true)
    {
        $results = [];

        if (!empty($menus[$parent_id])) {
            foreach ($menus[$parent_id] as $menu) {
                $url =  $menu->url;

                $data = [
                    'id' => encrypt($menu->id),
                    'parent_id' => (!empty($menu->parent_id)) ? encrypt($menu->parent_id) : null,
                    'label' => $menu->label,
                    'code' => $menu->code,
                    'url'   => $url,
                    'icon'  => $menu->icon,
                    'sequence'  => $menu->sequence,
                ];

                $results[] = $data;
            }
        }

        return $results;
    }

    public static function parsingMenu($menus, $parent_id = 0, $route = true)
    {
        $results = [];

        if (!empty($menus[$parent_id])) {
            foreach ($menus[$parent_id] as $menu) {
                $url =  $menu->url;

                $data = [
                    'id' => encrypt($menu->id),
                    'parent_id' => (!empty($menu->parent_id)) ? encrypt($menu->parent_id) : null,
                    'label' => $menu->label,
                    'code' => $menu->code,
                    'url'   => $url,
                    'icon'  => $menu->icon,
                    'sequence'  => $menu->sequence,
                ];

                if (isset($menus[$menu->id])) {
                    $data['children'] = self::parsingMenu($menus, $menu->id);
                }

                $results[] = $data;
            }
        }

        return $results;
    }

    public static function getRoutesAdmin($default = null)
    {
        $routeCollection = Route::getRoutes();
        $routes = [];

        if (!empty($default))
            $routes = ['' => $default];

        foreach ($routeCollection as $route) {
            $route_name = $route->getName();

            if (!empty($route_name)) {
                if (in_array('GET', $route->methods()) && count($route->parameterNames()) == 0)
                    $routes[$route_name] = $route_name;
            }
        }

        return $routes;
    }

    public static function store($data)
    {
        return DB::transaction(function () use ($data) {
            return Model::create([
                'label' => $data['label'],
                'code' => $data['code'],
                'url' => $data['url'],
                'icon' => $data['icon'],
                'parent_id' => !empty($data['parent_id']) ? decrypt($data['parent_id']) : NULL,
            ]);
        });
    }
}
