<?php

use App\Http\Controllers\studentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;
use App\Http\Controllers\userDelete;
use App\Http\Controllers\userUpdate;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("data",[user::class,'getData']);

Route::post("add",[studentController::class,'create']);

Route::post("del",[userDelete::class,'deleteData']);

Route::post("update",[userUpdate::class,'update']);
