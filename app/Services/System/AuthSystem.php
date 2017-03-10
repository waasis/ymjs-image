<?php
/**
 * Created by PhpStorm.
 * User: uoouki
 * Date: 2017/3/9
 * Time: 18:59
 */

namespace App\Services\System;

use App\User;

class AuthSystem
{


    static function create($data){

        // create 返回user 信息
        $res = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        return $res;
    }

    static function login($identifier,$pwd){


    }
}