<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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

Route::post('login', [AuthController::class, 'login' ]);
Route::post('register', [AuthController::class, 'register']);
Route::get('userInfo', [AuthController::class, 'userInfo']);
Route::put('/user/{id}', [UserAuthController::class , 'update']);
Route::delete('/user/{id}', [UserAuthController::class , 'delete']);

// Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
// Route::post('/register', 'Auth\ApiAuthController@register')->name('register.api');
