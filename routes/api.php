<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Cart\CartController;
use App\Http\Controllers\Api\Order\StoreOrderController;
use App\Http\Controllers\Api\Product\ProductController;
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

//auth Routs
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



Route::group(['middleware' => 'auth:sanctum'], function () {
    //product routs
    Route::resource('products',ProductController::class)->only('index','show');
    //cart routs
    Route::post('cart/add',[CartController::class,'addToCart']);
    Route::post('cart/remove/{product}',[CartController::class,'removeFromCart']);
    Route::post('cart/changeItemCount',[CartController::class,'changeItemCount']);

    //order routs
    Route::post('order/add',StoreOrderController::class);
});
