<?php


use App\Http\Controllers\Api\V1\AddressController;
use App\Http\Controllers\Api\V1\MenuItemController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\RestaurantController;
use App\Http\Controllers\AuthController;
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
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('restaurants',RestaurantController::class);
    Route::apiResource('menu_items', MenuItemController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('address', AddressController::class);
    });

});
