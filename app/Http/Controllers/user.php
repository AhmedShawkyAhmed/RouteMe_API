<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user extends Controller
{
    //
    public function getData()
    {
        header("Content-Type: JSON");
        $a = array("name"=>'Ahmed',"email"=>'shawkyahmed392@gmail.com',"phone"=>'+201154338430');
        return response(json_encode($a,JSON_PRETTY_PRINT))->header('Content-Type','JSON');
    }
}
