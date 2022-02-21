<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class login extends Controller
{
    //
    public function login(Request $request){

        $server = $request->input('server');
        $email = $request->input('email');
        $password = $request->input('password');

        if($server == ''){
            return [
                "message"=>'Server Name is Required'
            ];
        }else if($email == ''){
            return [
                "message"=>'Email is Required'
            ];
        }else if($password == ''){
            return [
                "message"=>'Password is Required'
            ];
        }else{
            $result = DB::select("select * from companies where server = '$server' and email = '$email' and password = '$password'");
            if(!$result){
                $result = DB::select("select * from dispatchers where server = '$server' and email = '$email' and password = '$password'");
                if(!$result){
                    $result = DB::select("select * from drivers where server = '$server' and email = '$email' and password = '$password'");
                    if(!$result){
                        $result = DB::select("select * from vendors where server = '$server' and email = '$email' and password = '$password'");
                        if(!$result){
                            return [
                                "status"=>404,
                                "message"=>'Not Found'
                            ];
                        }else{
                            return response(json_encode($result),200,['Content-Type' => 'application/json;charset=UTF-8']);
                        }
                    }else{
                        return response(json_encode($result),200,['Content-Type' => 'application/json;charset=UTF-8']);
                    }
                }else{
                    return response(json_encode($result),200,['Content-Type' => 'application/json;charset=UTF-8']);
                }
            }else{
                return response(json_encode($result),200,['Content-Type' => 'application/json;charset=UTF-8']);
            }
        }
    }
}
