<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getBranches extends Controller
{
    public function getBranches(Request $request){

        $vendorId = $request->input('vendorId');

        if($vendorId == ''){
            return [
                "status"=>405,
                "message"=>'vendorId is Required',
            ];
        }else{
            $result = DB::select("select * from branches where vendorId  = $vendorId");
            if ($result){
                return [
                    "status"=>200,
                    "branches"=>$result,
                ];
            }else {
                return [
                    "status"=>404,
                    "message"=>'No Branche Found',
                ];
            }
        }
    }

    public function getBranchesName(Request $request){

        $vendorId = $request->input('vendorId');

        if($vendorId == ''){
            return [
                "status"=>405,
                "message"=>'vendorId is Required',
            ];
        }else{
            $result = DB::select("select branchName from branches where vendorId  = $vendorId");
            if ($result){
                return [
                    "status"=>200,
                    "branches"=>$result,
                ];
            }else {
                return [
                    "status"=>404,
                    "message"=>'No Branche Found',
                ];
            }
        }
    }
}