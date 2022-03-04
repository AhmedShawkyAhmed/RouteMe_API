<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use Illuminate\Support\Facades\DB;

class register extends Controller
{
    //
    public function register(Request $request){
        $company = new company();

        $company->name = $request->input('name');
        $company->server = $request->input('server');
        $company->email = $request->input('email');
        $company->password = $request->input('password');
        $company->phone = $request->input('phone');

        $result = DB::select("select * from companies where server = '$company->server' or email = '$company->email'");

        if($result){
            return [
                "status"=>408,
                "message"=>'Account Already Exist',
            ];
        }else{
            if($company->name == ''){
                return [
                    "status"=>405,
                    "message"=>'Company Name is Required',
                ];
            }else if($company->server ==''){
                return [
                    "status"=>405,
                    "message"=>'Server Name is Required',
                ];
            }else if($company->email ==''){
                return [
                    "status"=>405,
                    "message"=>'Email is Required',
                ];
            }else if($company->password ==''){
                return [
                    "status"=>405,
                    "message"=>'Password is Required',
                ];
            }else if($company->phone ==''){
                return [
                    "status"=>405,
                    "message"=>'Phone Number is Required',
                ];
            }else{
                $result = $company->save();
                if($result)
                {
                    return [
                        "status"=>200,
                        "message"=>'Account Created Successfully',
                    ];
                }else{
                    return [
                        "status"=>500,
                        "message"=>'Failed to Create Company Account',
                    ];
                }
            }
        }
    }
}
