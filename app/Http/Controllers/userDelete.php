<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userDelete extends Controller
{
    //
    public function deleteData(Request $request)
    {
        // $id = $request->input('id');
        // $result = DB::delete("delete from students where id = $id");
        // if(!$result){
        //     return response(array(
        //         'message' => 'Not Found',
        //      ), 404);
        //     }
        // else{
        //     return response(array(
        //         'message' => 'User Deleted Successfuly',
        //      ), 200);
        // }
    }
}
