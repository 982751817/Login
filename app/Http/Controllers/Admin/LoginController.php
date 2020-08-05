<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class LoginController
{
    public function login(){
        $status =Auth::guard('admins')->attempt([
            'userName'=>Request::input('userName'),
            'password'=>Request::input('password')
        ]);
        if($status){
            $token = Str::random(10);
            Cache::put($token,Request::input('userName'),7200);
            return response()->json(['token'=>$token,200],200);
        }else{
            return response()->json(['message'=>'登录失败,账号或者密码错误',404]);
        }
    }
}
