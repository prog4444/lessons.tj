<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\DescController;

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
Route::prefix('admin')->group(function () {
    Route::post('register-admin', [\App\Http\Controllers\Admin\AdminController::class , 'register_admin']);
    Route::post('login-admin', [\App\Http\Controllers\Admin\AdminController::class , 'login_admin']);
    Route::post('create', [lessonsController::class, 'create']);
    Route::get('read', [lessonsController::class, 'read']);
    Route::patch('update/{id}', [lessonsController::class, 'update']);
    Route::post('delete/{id}', [lessonsController::class, 'delete']);
});

Route::prefix('user')->group(function () {
    Route::post('login', [AuthController::class, 'login' ]);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('userInfo', [AuthController::class, 'userInfo']);
    Route::put('/user/{id}', [UserAuthController::class , 'update']);
    Route::delete('/user/{id}', [UserAuthController::class , 'delete']);

    Route::post('comment', [DescController::class , 'comment']);
   
});