<?php

namespace App\Http\Controllers;

use App\Models\vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addVendor extends Controller
{
    public function addVendor(Request $request){
        $vendor = new vendor();

        $vendor->server = $request->input('server');
        $vendor->brandName = $request->input('brandName');
        $vendor->email = $request->input('email');
        $vendor->password = $request->input('password');
        if($request->file('brandImage') == null){
            $vendor->brandImage = "";
        }else{
            $vendor->brandImage = $request->file('brandImage')->store('apiImages','public');
        }

        $result = DB::select("select * from vendors where server = '$vendor->server' and email = '$vendor->email'");

        if($result){
            return [
                "status"=>408,
                "message"=>'Account Already Exist',
            ];
        }else{
            if($vendor->brandName == ''){
                return [
                    "status"=>405,
                    "message"=>'Brand Name is Required',
                ];
            }else if($vendor->server ==''){
                return [
                    "status"=>405,
                    "message"=>'Server Name is Required',
                ];
            }else if($vendor->email ==''){
                return [
                    "status"=>405,
                    "message"=>'Email is Required',
                ];
            }else if($vendor->password ==''){
                return [
                    "status"=>405,
                    "message"=>'Password is Required',
                ];
            }else if($vendor->brandImage ==''){
                return [
                    "status"=>405,
                    "message"=>'Brand Image is Required',
                ];
            }else{
                $result = $vendor->save();
                if($result){
                    return [
                        "status"=>200,
                        "message"=>'Vendor Account Created Successfully',
                    ];
                }else{
                    return [
                        "status"=>500,
                        "message"=>'Failed to Create Vendor Account',
                    ];
                }
            }
        }
    }
}