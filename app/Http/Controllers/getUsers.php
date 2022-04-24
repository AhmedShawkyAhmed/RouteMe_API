<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getUsers extends Controller
{
    public function getUsers(Request $request){

        $type = $request->input('type');
        $server = $request->input('server');

        if($type == ''){
            return [
                "status"=>405,
                "message"=>'type is Required [ dispatcher - driver - vendor ]',
            ];
        }else if($server == ''){
            return [
                "status"=>405,
                "message"=>'server is Required',
            ];
        }else{
            if($type == 'dispatcher'){
                $result = DB::select("select * from dispatchers where server = '$server' ");

                if ($result){
                    return [
                        "status"=>200,
                        "users"=>$result,
                    ];
                }else{
                    return [
                        "status"=>404,
                        "message"=>'No Dispatcher Found',
                    ];
                }
            }else if($type == 'driver'){
                $result = DB::select("select * from drivers where server = '$server' ");

                if ($result){
                    return [
                        "status"=>200,
                        "users"=>$result,
                    ];
                }else{
                    return [
                        "status"=>404,
                        "message"=>'No Driver Found',
                    ];
                }
            }else if($type == 'vendor'){
                $result = DB::select("select * from vendors where server = '$server' ");
                if ($result){
                    return [
                        "status"=>200,
                        "users"=>$result,
                    ];
                }else{
                    return [
                        "status"=>404,
                        "message"=>'No Vendor Found',
                    ];
                }
            }else{
                return [
                    "status"=>404,
                    "message"=>"The Type $type not Found - Types [ dispatcher - driver - vendor ]",
                ];
            }
        }
    }
}