<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dispatcher;
use App\Models\driver;
use App\Models\vendor;

class updateUser extends Controller
{
    public function updateUser(Request $request){

        $type = $request->input('type');
        $id = $request->input('id');

        if($type == ''){
            return [
                "status"=>405,
                "message"=>'type is Required [ dispatcher - driver - vendor ]',
            ];
        }else if($id == ''){
            return [
                "status"=>405,
                "message"=>'id is Required',
            ];
        }else{
            if($type == 'dispatcher' && !is_null(dispatcher::find($id))){
                $dispatcher = dispatcher::find($id);
                $result = $dispatcher->update($request->all());
                if($result){
                    return [
                        "status"=>200,
                        "message"=>'Dispatcher Data Updated Successfully',
                    ];
                }else{
                    return [
                        "status"=>404,
                        "message"=>'Not Found',
                    ];
                }
            }else if($type == 'driver' && !is_null(driver::find($id))){
                $driver = driver::find($id);
                $result = $driver->update($request->all());
                if($result){
                    return [
                        "status"=>200,
                        "message"=>'Driver Data Updated Successfully',
                    ];
                }else{
                    return [
                        "status"=>404,
                        "message"=>'Not Found',
                    ];
                }
            }else if($type == 'vendor' && !is_null(vendor::find($id))){
                $vendor = vendor::find($id);
                $result = $vendor->update($request->all());
                if($result){
                    return [
                        "status"=>200,
                        "message"=>'Vendor Data Updated Successfully',
                    ];
                }else{
                    return [
                        "status"=>404,
                        "message"=>'Not Found',
                    ];
                }
            }else{
                return [
                    "status"=>404,
                    "message"=>'Not Found',
                ];
            }
        }
    }
}