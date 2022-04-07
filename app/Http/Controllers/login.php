<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class login extends Controller
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
                $result = DB::select("select * from drivers where server = '$server' and email = '$email' and password = '$password'");
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
                        $result = DB::select("select * from vendors where server = '$server' and email = '$email' and password = '$password'");
                        if($result){
                            return [
                                "status"=>200,
                                "user"=>$result,
                            ];
                        }else{
                            # server
                            $servercompany = DB::select("select * from companies where server != '$server' and email = '$email' and password = '$password'");
                            $serverdriver = DB::select("select * from drivers where server != '$server' and email = '$email' and password = '$password'");
                            $serverdispatcher = DB::select("select * from dispatchers where server != '$server' and email = '$email' and password = '$password'");
                            $servervendor = DB::select("select * from vendors where server != '$server' and email = '$email' and password = '$password'");

                            # email
                            $emailcompany = DB::select("select * from companies where server = '$server' and email != '$email' and password = '$password'");
                            $emaildriver = DB::select("select * from drivers where server = '$server' and email != '$email' and password = '$password'");
                            $emaildispatcher = DB::select("select * from dispatchers where server = '$server' and email != '$email' and password = '$password'");
                            $emailvendor = DB::select("select * from vendors where server = '$server' and email != '$email' and password = '$password'");

                            # password
                            $passwordcompany = DB::select("select * from companies where server = '$server' and email = '$email' and password != '$password'");
                            $passworddriver = DB::select("select * from drivers where server = '$server' and email = '$email' and password != '$password'");
                            $passworddispatcher = DB::select("select * from dispatchers where server = '$server' and email = '$email' and password != '$password'");
                            $passwordvendor = DB::select("select * from vendors where server = '$server' and email = '$email' and password != '$password'");
                            
                            if($servercompany || $serverdispatcher || $serverdriver || $servervendor){
                                return [
                                    "status"=>505,
                                    "message"=>'Server is Wrong',
                                ];
                            }else if($emailcompany || $emaildispatcher || $emaildriver || $emailvendor){
                                return [
                                    "status"=>505,
                                    "message"=>'Email is Wrong',
                                ];
                            }else if($passwordcompany || $passworddispatcher || $passworddriver || $passwordvendor){
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
    }
}