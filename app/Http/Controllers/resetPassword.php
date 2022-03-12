<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\dispatcher;
use App\Models\driver;
use App\Models\vendor;
use Illuminate\Http\Request;

class resetPassword extends Controller
{
    public function resetPassword(Request $request){

        $type = $request->input('type');
        $id = $request->input('id');
        $pass = $request->input('password');

        if($type == ''){
            return [
                "status"=>405,
                "message"=>'type is Required [ owner - driver - dispatcher - vendor ]',
            ];
        }else if($id == ''){
            return [
                "status"=>405,
                "message"=>'id is Required',
            ];
        }else if($pass == ''){
            return [
                "status"=>405,
                "message"=>'password is Required',
            ];
        }else{
            if($type == 'owner' && !is_null(company::find($id))){
                $company = company::find($id);
                $result = $company->update($request->all());
                if($result){
                    return [
                        "status"=>200,
                        "message"=>'Password Updated Successfully',
                    ];
                }else{
                    return [
                        "status"=>404,
                        "message"=>'Not Found',
                    ];
                }
            }else if($type == 'dispatcher' && !is_null(dispatcher::find($id))){
                $dispatcher = dispatcher::find($id);
                $result = $dispatcher->update($request->all());
                if($result){
                    return [
                        "status"=>200,
                        "message"=>'Password Updated Successfully',
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
                        "message"=>'Password Updated Successfully',
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
                        "message"=>'Password Updated Successfully',
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