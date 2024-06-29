<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthenticationController::class)->group(function () { 
    Route::post('/login' , 'login') ;
});

Route::middleware('auth:sanctum')->controller(UserController::class)->group(function() {
    Route::post('store' , 'store') ;
    Route::post('update/{id}' , 'update') ;
    Route::post('delete/{id}' , 'destroy') ;
 }); 