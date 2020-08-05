<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class webToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('access-token');
        $res = Cache::get($token);
        if($res){
            $request->merge(['userName'=>$res]);
        }else{
            return response()->json(['message'=>'token错误或者过期,请重新登录','code'=>401]);
        }

        return $next($request);
    }
}
