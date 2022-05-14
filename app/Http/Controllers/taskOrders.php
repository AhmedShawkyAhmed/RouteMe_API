<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class taskOrders extends Controller
{
    public function taskOrders(Request $request){

        $server = $request->input('server');

        if($server == ''){
            return [
                "status"=>405,
                "message"=>'Server Name is Required',
            ];
        }else{
            $result = DB::select("select * from orders where server = '$server' and id not in (select orderNumber from tasks)");

            if ($result){
                return [
                    "status"=>200,
                    "orders"=>$result,
                ];
            }else {
                return [
                    "status"=>404,
                    "message"=>'No Orders Found',
                ];
            }
        }
    }
}
