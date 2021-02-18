<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Cms\UsersController;
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
//
//Route::middleware(['auth:api', 'role:employee'])->get('/user', function (Request $request) {
//    return  'ok';//$request->user()->role;
//});

//Route::get('/user', function (Request $request) {
//    return "sasa";
//    return $request->user();
//});

//Route::get('/mail', [AdminController::class, 'createUser']);
//
//Route::post('/photo', [AdminController::class, 'uploadPhoto']);
//Route::post('/admin/hireUser', [AdminController::class, 'hireUser']);

//Route::post('/auth/login', LoginController::class);

// Общая маршрутизация.
Route::post('auth/login', LoginController::class);

Route::middleware('auth:api')->group(function (){
    // Маршрутизация для админа.
    Route::middleware('role:admin')->group(function (){
        Route::apiResource('users', UsersController::class);
    }); // group.

    // Маршрутизация для работников.
    Route::middleware('role:employee')->group(function (){

    }); // group
}); // group.
