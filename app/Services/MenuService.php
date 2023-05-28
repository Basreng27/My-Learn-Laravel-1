<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt; //package untuk encrpy decrypt

use App\Bases\BaseServices;
use Illuminate\Support\Facades\Route;

class MenuService extends BaseServices
{
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
}
