<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\brandController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\userController;

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

Route::controller(brandController::class)->group(function(){
    Route::get('brand','index');
    Route::get('brand/{brand_id}','show');
    Route::post('brand','store');
    Route::put('brand/{brand_id}','update');
    Route::delete('brand/{brand_id}','destroy');
});

Route::controller(categoryController::class)->group(function(){
    Route::get('category','index');
    Route::get('category/{category_id}','show');
    Route::post('category','store');
    Route::put('category','update');
    Route::delete('category/{category_id}','destroy');
});

Route::controller(cartController::class)->group(function(){
    Route::get('cart','index');
    Route::get('cart/{user_id}','show');
    Route::post('cart','store');
    Route::put('cart','update');
    Route::delete('cart/{category_id}','destroy');
});

Route::controller(userController::class)->group(function(){
    Route::get('user','index');
    Route::get('user/{user_id}','show');
    Route::post('user','store');
    Route::put('user','update');
    Route::delete('user/{user_id}','destroy');
});