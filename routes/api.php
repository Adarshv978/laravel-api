<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:sanctum'], function () {
    //All secure URL's

});

Route::post('singnup', [AccountController::class, 'customers']);
Route::get('allcustomer', [AccountController::class, 'getallCustomers']);

Route::post("login", [UserController::class, 'index']);
Route::post('customerLogin',[AccountController::class,'logInCustomer']);

Route::get('otp',[AccountController::class,'generateOTP']);
Route::post('sendOTP',[AccountController::class,'sendOTP']);
Route::post('verifyOtp',[AccountController::class,'verifyOtp']);



// Theme API => Application Programming Interface
Route::post('theme',[AccountController::class,'upload']);
Route::get('theme',[AccountController::class,'showAllThemes']);
Route::get('showOneTheme/{id}',[AccountController::class,'showOneTheme']);
Route::delete('deleteTheme/{id}',[AccountController::class,'delete']);
Route::put('updateTheme/{id}',[AccountController::class,'update']);



