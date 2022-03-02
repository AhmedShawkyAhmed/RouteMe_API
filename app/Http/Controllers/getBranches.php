<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getBranches extends Controller
{
    public function getBranches(Request $request)
    {
        $vendorId = $request->input('vendorId');

        if($vendorId == ''){
            return [
                "status"=>405,
                "message"=>'vendorId is Required'
            ];
        }else{
            $result = DB::select("select * from branches where vendorId  = $vendorId");

            if (!$result){
                return [
                    "status"=>500,
                    "message"=>'No Branches Found'
                ];
            }else {
                return response(json_encode($result),200,['Content-Type' => 'application/json;charset=UTF-8']);
            }
        }
    }
}
