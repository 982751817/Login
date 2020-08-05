<?php

function create_token($key){
    return $token = md5($key.sha1(substr(time(),3,5)));
}

function checkToken($key,$token){
    $true = md5($key.sha1(substr(time(),3,5)));
    var_dump($true);
    if($token == $true){
        return true;  //token正确
    }else{
        return false;
    }
}
