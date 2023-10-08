<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function response($status = true , $code = 200 , $message = 'success' , $data = []){

        return response()->json([
            'status'=> $status
            ,'code'=>$code  
            , 'message'=>$message 
            , 'data'=>$data 
        ]);
    }
}
