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


     static  public function  register($data,$type='common'){

         $result = AuthSystem::create($data);

         if($type){


         }
         // 返回用户信息
         return  $result;
     }

    static public  function  registerWithPhone($phone,$pwd){
         // 返回用户信息
         return  [];
    }

    // web 专用
    static  public function  login($identifier,$password){


    }

}