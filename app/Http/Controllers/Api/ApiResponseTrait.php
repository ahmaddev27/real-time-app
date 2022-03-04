<?php
namespace App\Http\Controllers\Api;

trait ApiResponseTrait{

    public function apiRespose($data=null,$message=null,$status){

        $array=[
            'data'=>$data,
            'message'=>$message,
            'status'=>$status

        ];


        return response($array);

    }
}


