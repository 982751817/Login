<?php


namespace App\Http\Controllers\Admin;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Valitor\RegisterValitor;

class TestController
{
    public function index(Request $request){
        $true = checkToken('admin','14ff62baccd30cb145497fc5c034f8d0');
        var_dump($true);
    }
}
