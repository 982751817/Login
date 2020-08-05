<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Request;

class ApiException extends \Exception
{

    /**
     * $apiErrConst 是我们在自定义错误码的时候 已经定义好的常量
     * 只需要传过来就行了
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {

        parent::__construct($message, $code, $previous);

    }

    public function render(Request $request)
    {

        return response()->json(['msg' => $this->message,'code'=>$this->code], $this->code);
    }
}

