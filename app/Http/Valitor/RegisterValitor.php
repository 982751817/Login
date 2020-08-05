<?php


namespace App\Http\Valitor;
use App\Exceptions\ApiException;
use Illuminate\Support\Facades\Validator;

class RegisterValitor
{
    public $rules = [
        'userName' => 'required|max:6',
        'password' => 'required|between:4,6'
        ];

    public $message =[
        'userName.required' => '用户名是必须的',
        'userName.max' => '用户名不能超过6',
        'password.required' => '密码是必须的',
        'password.between' => '密码长度在4,6',
    ];
    public function toCheck(array $data){
        $val = Validator::make($data,$this->rules,$this->message);
        if($fails = $val->fails()) {
            throw new ApiException($val->errors()->first(),'500');
        }
    }
}
