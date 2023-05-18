<?php

use App\Http\Controllers\Api\MenuItemController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RestaurantController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::prefix('v1')->group(function () {
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

    Route::middleware('auth:api')->group(function () {
        Route::apiResource('restaurants', RestaurantController::class);
        Route::apiResource('menu_items', MenuItemController::class);
        Route::apiResource('orders', OrderController::class);
    });
});
