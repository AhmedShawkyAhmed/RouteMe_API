<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getBranches extends Controller
{
    public function getBranchers(Request $request)
    {
        $vendorId = $request->input('vendorId');

        $result = DB::select("select * from branches where vendorId  = $vendorId");

        if (!$result) {
            return [
                "status"=>500,
                "message"=>'Faild to Get Branches'
            ];
        }else {
            return response(json_encode($result),200,['Content-Type' => 'application/json;charset=UTF-8']);
        }
    }
}
