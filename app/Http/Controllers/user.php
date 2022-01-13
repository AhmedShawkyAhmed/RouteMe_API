<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user extends Controller
{
    //
    public function getData()
    {
        return ["name"=>'Ahmed',"email"=>'shawkyahmed392@gmail.com',"phone"=>'+201154338430'];
    }
}
