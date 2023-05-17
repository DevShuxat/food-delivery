<?php

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

//    Route::middleware('auth:api')->group(function () {
        Route::prefix('restaurants')->group(function () {
            Route::get('/', [RestaurantController::class, 'index']);
            Route::get('/{id}', [RestaurantController::class,'show']);
            Route::put('/{id}', [RestaurantController::class,'update']);
            Route::delete('/{id}', [RestaurantController::class,'destroy']);
            Route::post('/', [RestaurantController::class,'store']);
        });

//        Route::prefix('menu_items')->group(function () {
//            Route::get('/', 'MenuItemController@index');
//            Route::get('/{id}', 'MenuItemController@show');
//            Route::post('/', 'MenuItemController@store');
//            Route::put('/{id}', 'MenuItemController@update');
//            Route::delete('/{id}', 'MenuItemController@destroy');
//        });
//
//        Route::prefix('orders')->group(function () {
//            Route::get('/', 'OrderController@index');
//            Route::get('/{id}', 'OrderController@show');
//            Route::post('/', 'OrderController@store');
//            Route::put('/{id}', 'OrderController@update');
//            Route::delete('/{id}', 'OrderController@destroy');
//        });
//
//        Route::post('/payment', 'PaymentController@process');
//    });
});
