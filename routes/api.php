<?php

use App\Http\Controllers\addDispatcher;
use App\Http\Controllers\addDriver;
use App\Http\Controllers\addVendor;
use App\Http\Controllers\companyRegister;
use App\Http\Controllers\deleteUser;
use App\Http\Controllers\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\verifyCode;

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

Route::post("register",[companyRegister::class,'register']);

Route::post("login",[login::class,'login']);

Route::post("addDispatcher",[addDispatcher::class,'addDispatcher']);

Route::post("addDriver",[addDriver::class,'AddDriver']);

Route::post("addVendor",[addVendor::class,'addVendor']);

Route::post("deleteUser",[deleteUser::class,'deleteUser']);

Route::post("verify",[verifyCode::class,'send']);

Route::post("search",[search::class,'search']);

Route::post("requestPickup",[requestPickup::class,'requestPickup']);

Route::post("getBranches",[getBranches::class,'getBranches']);

Route::post("addBranch",[addBranch::class,'addBranch']);