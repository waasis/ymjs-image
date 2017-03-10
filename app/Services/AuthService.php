<?php
/**
 * Created by PhpStorm.
 * User: uoouki
 * Date: 2017/3/9
 * Time: 18:59
 *
 * Use model at here
 *
 */

namespace App\Services;

use  App\Services\System\AuthSystem;

class AuthService
{


     static  public function  register($data){



         $result = AuthSystem::create($data);

        // 返回用户信息
        return  $result;
     }

    static public function  registerWithPhone($phone,$pwd){
         // 返回用户信息
        return  [];
    }

    static  public function  login($identifier,$password){


    }

}