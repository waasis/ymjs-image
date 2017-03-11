<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('test','ImageController@show');

Route::post('register','AuthController@signUp');


// https://api.yimishiji.com/v1/img/24fde0385461af47db2c45560709e731-w200.png
/*
GET	        /photos	             index	photos.index
GET	        /photos/create	     create	photos.create
POST	    /photos	         store	photos.store
GET	        /photos/{photo}	     show	photos.show
GET	        /photos/{photo}/edit	edit	photos.edit
PUT/PATCH	/photos/{photo}	update	photos.update
*/
// 非登录页面不需要 auth:api
Route::group(['middeware'=>'auth:api'],function(){

     Route::resource('auth','AuthController',['only'=>['index','show','store']]);
     Route::group(['middeware'=>'auth:api'],function(){
         Route::resource('img','ImageController',['only'=>['index','show']]);
     });

});
