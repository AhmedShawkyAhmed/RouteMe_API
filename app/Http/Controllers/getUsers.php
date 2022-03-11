<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getUsers extends Controller
{
    public function getUsers(Request $request){

        $type = $request->type;

        if($type == ''){
            return [
                "status"=>405,
                "message"=>'type is Required [ dispatcher - driver - vendor ]',
            ];
        }else{
            if($type == 'dispatcher'){
                $result = DB::select("select * from dispatchers");

                if ($result){
                    return response(
                        json_encode($result),
                        200,
                        [
                            'Content-Type' => 'application/json;charset=UTF-8',
                        ],
                    );
                }else{
                    return [
                        "status"=>404,
                        "message"=>'No Dispatcher Found',
                    ];
                }
            }else if($type == 'driver'){
                $result = DB::select("select * from drivers");

                if ($result){
                    return response(
                        json_encode($result),
                        200,
                        [
                            'Content-Type' => 'application/json;charset=UTF-8',
                        ],
                    );
                }else{
                    return [
                        "status"=>404,
                        "message"=>'No Driver Found',
                    ];
                }
            }else if($type == 'vendor'){
                $result = DB::select("select * from vendors");

                if ($result){
                    return response(
                        json_encode($result),
                        200,
                        [
                            'Content-Type' => 'application/json;charset=UTF-8',
                        ],
                    );
                }else{
                    return [
                        "status"=>404,
                        "message"=>'No Vendor Found',
                    ];
                }
            }else{
                return [
                    "status"=>404,
                    "message"=>"The Type $type not Found",
                    "typs"=>"[ dispatcher - driver - vendor ]",
                ];
            }
        }
    }
}