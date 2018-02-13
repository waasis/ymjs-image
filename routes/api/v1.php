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

// 仅仅许可 store 不用验证身份
//Route::post('register','UserController@store');
Route::resource('user','UserController',['only'=>['store']]);


// https://api.yimishiji.com/v1/img/24fde0385461af47db2c45560709e731-w200.png
/*
GET	        /img	             index	Image.index
GET	        /img/create	     create	Image.create
POST	    /img	         store	Image.store
GET	        /img/{img}	     show	Image.show
GET	        /img/{img}/edit	edit	Image.edit
PUT/PATCH	/img/{img}	update	Image.update
*/
// 非登录页面不需要 auth:api
Route::group(['middleware'=>'auth:api'],function(){

    Route::resource('img','ImageController',['only'=>['index','show']]);

    // 除了 store 外的方法都要做身份认证
    Route::resource('user','UserController',['except'=>['store']]);


});
