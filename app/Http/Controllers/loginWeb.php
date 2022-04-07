<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginWeb extends Controller
{
    public function login(Request $request){

        $server = $request->input('server');
        $email = $request->input('email');
        $password = $request->input('password');

        if($server == ''){
            return [
                "status"=>405,
                "message"=>'Server Name is Required',
            ];
        }else if($email == ''){
            return [
                "status"=>405,
                "message"=>'Email is Required',
            ];
        }else if($password == ''){
            return [
                "status"=>405,
                "message"=>'Password is Required',
            ];
        }else{
            $result = DB::select("select * from companies where server = '$server' and email = '$email' and password = '$password'");
            if($result){
                return [
                    "status"=>200,
                    "user"=>$result,
                ];
            }else{
                $result = DB::select("select * from dispatchers where server = '$server' and email = '$email' and password = '$password'");
                if($result){
                    return [
                        "status"=>200,
                        "user"=>$result,
                    ];
                }else{
                    # server
                    $servercompany = DB::select("select * from companies where server != '$server' and email = '$email' and password = '$password'");
                    $serverdispatcher = DB::select("select * from dispatchers where server != '$server' and email = '$email' and password = '$password'");

                    # email
                    $emailcompany = DB::select("select * from companies where server = '$server' and email != '$email' and password = '$password'");
                    $emaildispatcher = DB::select("select * from dispatchers where server = '$server' and email != '$email' and password = '$password'");

                    # password
                    $passwordcompany = DB::select("select * from companies where server = '$server' and email = '$email' and password != '$password'");
                    $passworddispatcher = DB::select("select * from dispatchers where server = '$server' and email = '$email' and password != '$password'");
                    
                    if($servercompany || $serverdispatcher){
                        return [
                            "status"=>505,
                            "message"=>'Server is Wrong',
                        ];
                    }else if($emailcompany || $emaildispatcher){
                        return [
                            "status"=>505,
                            "message"=>'Email is Wrong',
                        ];
                    }else if($passwordcompany || $passworddispatcher){
                        return [
                            "status"=>505,
                            "message"=>'Password is Wrong',
                        ];
                    }else{
                        return [
                            "status"=>404,
                            "message"=>'User Not Found',
                        ];
                    }
                }
            }  
        }
    }
}
