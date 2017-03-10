<?php
/**
 * Created by PhpStorm.
 * User: uoouki
 * Date: 2017/3/3
 * Time: 18:52
 */

namespace App\Services;


use App\Services\System\ImageSystem;

class ImageService extends  ServicesAbstract
{


     static public function getImg($image){

             $id=parseImageName($image);

             $img=ImageSystem::getImage($id);

             return $img;
     }

    static  public  function storeImg($img){


    }
}