<?php

namespace App\Http\Controllers;

use App\Models\branch;
use Illuminate\Http\Request;

class addBranch extends Controller
{
    public function addBranch(Request $request)
    {
        $branch = new branch();

        $branch->vendorId = $request->input('vendorId');
        $branch->branchName = $request->input('branchName');
        $branch->phone = $request->input('phone');
        $branch->location = $request->input('location');

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
        }else if($branch->location ==''){
            return [
                "status"=>405,
                "message"=>'location is Required',
            ];
        }else{
            $result = $branch->save();
            if($result)
            {
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
