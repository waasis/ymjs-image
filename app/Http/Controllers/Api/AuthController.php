<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AuthController extends Controller
{
    //
    use RegistersUsers;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = \Route::current();

        $name = \Route::currentRouteName();

        $action = \Route::currentRouteAction();

        var_dump($name,$action);

        echo 'hi , this is index!';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();


        // 验证数据
        // confirmed 规则的使用，参考：https://laravel.com/docs/5.4/validation#rule-confirmed
        // Validator api 参考：https://laravel.com/api/5.4/Illuminate/Validation/Validator.html#method_validate
        
        // $type  和 整个表单的message ,rule 都独立出来，到指定文件
        if(isset($data['phone'])){

             $messages = [
            'phone.required' => '手机号必填! ',
            'password.confirmed' => '两次输入的密码不一致！',
        ];

             $rules = [
            'phone' => ['required','regex:/^1[3|4|5|8|7][0-9]{9}$/','unique:users'],
            'password' => 'required|min:6|confirmed',
        ];
            $type='phone';
        }else{

             $messages = [
            'name.required' => '必须填写用户名! ',
            'password.confirmed' => '两次输入的密码不一致！',
           ];

             $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ];

        }

        $res = Validator::make($data,$rules,$messages);

        if($res->fails()){
             $msg=$res->messages();
             return response()->json($msg,200);
        }

        // 创建用户
        $res = AuthService::register($data,$type);

        // 返回json信息
        $headers=[];
        return  response()->json($res,200)->withHeaders($headers);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
        echo 'hi , this is show method!';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
