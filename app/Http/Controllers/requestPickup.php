<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class requestPickup extends Controller
{
    public function requestPickup(Request $request){
        $pickUp = new order();
    
        $pickUp->clientName = $request->clientName;
        $pickUp->clientPhone = $request->clientPhone;
        $pickUp->itemCount = $request->itemCount;
        $pickUp->price = $request->price;
        $pickUp->branchId = $request->branchId;
        $pickUp->vendorId = $request->vendorId;
        $pickUp->lon = $request->lon;
        $pickUp->lat = $request->lat;
        $pickUp->address = $request->address;
        $pickUp->state = $request->state;

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
        }else if($pickUp->lon ==''){
            return [
                "status"=>405,
                "message"=>'lon is Required ( Longitude )',
            ];
        }else if($pickUp->lat ==''){
            return [
                "status"=>405,
                "message"=>'lat is Required ( Latitude )',
            ];
        }else if($pickUp->address ==''){
            return [
                "status"=>405,
                "message"=>'address is Required',
            ];
        }else if($pickUp->state ==''){
            return [
                "status"=>405,
                "message"=>'state is Required',
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