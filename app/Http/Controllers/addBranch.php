<?php

namespace App\Http\Controllers;

use App\Models\branch;
use Illuminate\Http\Request;

class addBranch extends Controller
{
    public function addBranch(Request $request){
        $branch = new branch();

        $branch->vendorId = $request->vendorId;
        $branch->branchName = $request->branchName;
        $branch->phone = $request->phone;
        $branch->lon = $request->lon;
        $branch->lat = $request->lat;
        $branch->address = $request->address;

        if($branch->vendorId == ''){
            return [
                "status"=>405,
                "message"=>'vendorId is Required',
            ];
        }else if($branch->branchName ==''){
            return [
                "status"=>405,
                "message"=>'branchName is Required',
            ];
        }else if($branch->phone ==''){
            return [
                "status"=>405,
                "message"=>'phone is Required',
            ];
        }else if($branch->lon ==''){
            return [
                "status"=>405,
                "message"=>'lon is Required ( Longitude )',
            ];
        }else if($branch->lat ==''){
            return [
                "status"=>405,
                "message"=>'lat is Required ( Latitude )',
            ];
        }else if($branch->address ==''){
            return [
                "status"=>405,
                "message"=>'address is Required',
            ];
        }else{
            $result = $branch->save();
            if($result){
                return [
                    "status"=>200,
                    "message"=>'Branch Added Successfully',
                ];
            }else{
                return [
                    "status"=>500,
                    "message"=>'Failed to Add Branch',
                ];
            }
        }
    }
}