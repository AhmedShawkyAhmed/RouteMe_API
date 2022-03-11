<?php

namespace App\Http\Controllers;

use App\Models\driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addDriver extends Controller
{
    public function addDriver(Request $request){
        $driver = new driver();

        $driver->server = $request->server;
        $driver->name = $request->name;
        $driver->email = $request->email;
        $driver->password = $request->password;
        $driver->phone = $request->phone;

        $result = DB::select("select * from drivers where server = '$driver->server' and email = '$driver->email'");

        if($result){
            return [
                "status"=>408,
                "message"=>'Account Already Exist'
            ];
        }else{
            if($driver->name == ''){
                return [
                    "status"=>405,
                    "message"=>'Diver Name is Required',
                ];
            }else if($driver->server ==''){
                return [
                    "status"=>405,
                    "message"=>'Server Name is Required',
                ];
            }else if($driver->email ==''){
                return [
                    "status"=>405,
                    "message"=>'Email is Required',
                ];
            }else if($driver->password ==''){
                return [
                    "status"=>405,
                    "message"=>'Password is Required',
                ];
            }else if($driver->phone ==''){
                return [
                    "status"=>405,
                    "message"=>'Phone Number is Required',
                ];
            }else{
                $result = $driver->save();
                if($result){
                    return [
                        "status"=>200,
                        "message"=>'Driver Account Created Successfully',
                    ];
                }else{
                    return [
                        "status"=>500,
                        "message"=>'Failed to Create Driver Account',
                    ];
                }
            }
        }
    }
}