<?php


namespace App\Http\Controllers\Admin;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Valitor\RegisterValitor;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController
{
    public function register(Request $request,RegisterValitor $registerValitor){
        $data = $request -> all();
        $registerValitor->toCheck($data);
        $data['password']  = Hash::make(($data['password']));
        $user = Users::create($data);
        $token = Str::random(10);
        Cache::put($token,$data['userName'],3600);
        return response()->json([
            'message'=>'创建成功',
            'data'=>['token'=>$token,'user'=>$user->toArray()],
            'code'=>201],
        201);
    }
}
