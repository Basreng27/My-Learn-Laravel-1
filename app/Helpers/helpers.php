<?php

if (!function_exists('plugins')) {
    function plugins()
    {
        return asset('plugins/');
    }
}

if (!function_exists('dist')) {
    function dist()
    {
        return asset('dist/');
    }
}

if (!function_exists('styleCustom')) {
    function styleCustom()
    {
        return asset('custom/');
    }
}
