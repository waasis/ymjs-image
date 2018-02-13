<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{

    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


        $arg=$request->all();

        var_dump($arg);


        exit;
        $data = $request->all();

        // 验证数据
        // confirmed 规则的使用，参考：https://laravel.com/docs/5.4/validation#rule-confirmed
        // Validator api 参考：https://laravel.com/api/5.4/Illuminate/Validation/Validator.html#method_validate
        $messages = [
            'name.required' => '必须填写用户名! ',
            'password.confirmed' => '两次输入的密码不一致！',
        ];

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];

        $res = Validator::make($data,$rules,$messages);

        if($res->fails()){
             $msg=$res->messages();
             return response()->json($msg,200);
        }

        // 创建用户
        $res = AuthService::register($data);

        // 返回json信息
        $headers=[];
        return  response()->json($res,200)->withHeaders($headers);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        echo "id is :".$id;
        //return true;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
