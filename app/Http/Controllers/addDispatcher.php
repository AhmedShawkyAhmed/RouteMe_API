<?php

namespace App\Http\Controllers;

use App\Models\dispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addDispatcher extends Controller
{
    //
    public function addDispatcher(Request $request){
        $dispatcher = new dispatcher();

        $dispatcher->server = $request->input('server');
        $dispatcher->name = $request->input('name');
        $dispatcher->email = $request->input('email');
        $dispatcher->password = $request->input('password');
        $dispatcher->phone = $request->input('phone');

        $result = DB::select("select * from dispatchers where server = '$dispatcher->server' and email = '$dispatcher->email'");

        if($result){
            return [
                "status"=>408,
                "message"=>'Account Already Exist',
            ];
        }else{
            if($dispatcher->name == ''){
                return [
                    "status"=>405,
                    "message"=>'Dispatcher Name is Required',
                ];
            }else if($dispatcher->server ==''){
                return [
                    "status"=>405,
                    "message"=>'Server Name is Required',
                ];
            }else if($dispatcher->email ==''){
                return [
                    "status"=>405,
                    "message"=>'Email is Required',
                ];
            }else if($dispatcher->password ==''){
                return [
                    "status"=>405,
                    "message"=>'Password is Required',
                ];
            }else if($dispatcher->phone ==''){
                return [
                    "status"=>405,
                    "message"=>'Phone Number is Required',
                ];
            }else{
                $result = $dispatcher->save();
                if($result)
                {
                    return [
                        "status"=>200,
                        "message"=>'Dispatcher Account Created Successfully',
                    ];
                }else{
                    return [
                        "status"=>500,
                        "message"=>'Failed to Create Dispatcher Account',
                    ];
                }
            }
        }
    }
}
