<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class user extends Controller
{
    //
    public function getData()
    {
        header("Content-Type: JSON");
        $result = DB::select("select * from students");
        return response(json_encode($result,JSON_PRETTY_PRINT))->header('Content-Type','JSON');
    }
}
