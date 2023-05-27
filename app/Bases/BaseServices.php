<?php

namespace App\Bases;

class BaseServices
{
    public static function outputResult($data, $code = 200, $message = '')
    {
        return [
            'code' => $code,
            'status' => ($code == 200) ? 'success' : 'error',
            'message' => $message,
            'data' => $data
        ];
    }
}
