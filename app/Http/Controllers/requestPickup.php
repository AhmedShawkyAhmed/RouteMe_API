<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class requestPickup extends Controller
{
    public function requestPickup(Request $request){
        $pickUp = new order();
    
        $pickUp->clientName = $request->input('clientName');
        $pickUp->clientPhone = $request->input('clientPhone');
        $pickUp->itemCount = $request->input('itemCount');
        $pickUp->price = $request->input('price');
        $pickUp->branchId = $request->input('branchId');
        $pickUp->vendorId = $request->input('vendorId');
        $pickUp->lon = $request->input('lon');
        $pickUp->lat = $request->input('lat');
        $pickUp->address = $request->input('address');

        if($pickUp->clientName == ''){
            return [
                "status"=>405,
                "message"=>'Client Name is Required',
            ];
        }else if($pickUp->clientPhone ==''){
            return [
                "status"=>405,
                "message"=>'Client phone is Required',
            ];
        }else if($pickUp->itemCount ==''){
            return [
                "status"=>405,
                "message"=>'Item count is Required',
            ];
        }else if($pickUp->price ==''){
            return [
                "status"=>405,
                "message"=>'price is Required',
            ];
        }else if($pickUp->branchId ==''){
            return [
                "status"=>405,
                "message"=>'branchId is Required',
            ];
        }else if($pickUp->vendorId ==''){
            return [
                "status"=>405,
                "message"=>'vendorId is Required',
            ];
        }else if($pickUp->clientLocation ==''){
            return [
                "status"=>405,
                "message"=>'clientLocation is Required',
            ];
        }else{
            $result = $pickUp->save();
            if($result){
                return [
                    "status"=>200,
                    "message"=>'Pick Up Request Created Successfully',
                ];
            }else{
                return [
                    "status"=>500,
                    "message"=>'Failed to Create Pickup Request',
                ];
            }
        }
    }
}