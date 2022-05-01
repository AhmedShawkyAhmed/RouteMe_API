<?php

use App\Http\Controllers\addDispatcher;
use App\Http\Controllers\addDriver;
use App\Http\Controllers\addVendor;
use App\Http\Controllers\deleteUser;
use App\Http\Controllers\verifyCode;
use App\Http\Controllers\getBranches;
use App\Http\Controllers\addBranch;
use App\Http\Controllers\createTask;
use App\Http\Controllers\getDispatcherTasks;
use App\Http\Controllers\getDriverTasks;
use App\Http\Controllers\getUsers;
use App\Http\Controllers\getVendorOrders;
use App\Http\Controllers\loginMobile;
use App\Http\Controllers\loginWeb;
use App\Http\Controllers\register;
use App\Http\Controllers\requestPickup;
use App\Http\Controllers\getPreviousTasks;
use App\Http\Controllers\resetPassword;
use App\Http\Controllers\searchOrders;
use App\Http\Controllers\taskStatus;
use App\Http\Controllers\updateUser;
use App\Http\Controllers\updateUserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post("register",[register::class,'register']);

Route::post("loginMobile",[loginMobile::class,'login']);

Route::post("loginWeb",[loginWeb::class,'login']);

Route::post("verifyCode",[verifyCode::class,'verifyCode']);

Route::post("resetPassword",[resetPassword::class,'resetPassword']);

Route::post("addDispatcher",[addDispatcher::class,'addDispatcher']);

Route::post("addDriver",[addDriver::class,'addDriver']);

Route::post("addVendor",[addVendor::class,'addVendor']);

Route::post("updateUser",[updateUser::class,'updateUser']);

Route::post("deleteUser",[deleteUser::class,'deleteUser']);

Route::post("getVendorOrders",[getVendorOrders::class,'getVendorOrders']);

Route::post("requestPickup",[requestPickup::class,'requestPickup']);

Route::post("getBranches",[getBranches::class,'getBranches']);

Route::post("addBranch",[addBranch::class,'addBranch']);

Route::post("getDispatcherTasks",[getDispatcherTasks::class,'getDispatcherTasks']);

Route::post("getUsers",[getUsers::class,'getUsers']);

Route::post("searchOrders",[searchOrders::class,'searchOrders']);

Route::post("createTask",[createTask::class,'createTask']);

Route::post("getDriverTasks",[getDriverTasks::class,'getDriverTasks']);

Route::post("getPreviousTasks",[getPreviousTasks::class,'getPreviousTasks']);

Route::post("taskStatus",[taskStatus::class,'taskStatus']);

Route::post("updateUserStatus",[updateUserStatus::class,'updateUserStatus']);