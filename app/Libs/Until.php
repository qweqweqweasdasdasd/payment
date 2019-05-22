<?php 

namespace App\Libs;

class Until
{
    public $code;
    public $msg;

    public static function Result($code,$msg)
    {
        return [
            'code' => $code,
            'msg' => $msg
        ];
    }
}
