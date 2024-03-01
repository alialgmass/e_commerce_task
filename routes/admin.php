<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\admin\OrderController;
use Illuminate\Support\Facades\Route;


Route::group([], function () {
    Route::get('login', [AuthController::class, 'showloginform']);
    Route::post('login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');

});

// home routs
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
});


Route::group(['middleware' => ['auth','role:admin'], 'prefix' => 'order'], function () {
    Route::get('/', [OrderController::class, 'index'])->name('admin.order.index');
    Route::get('/{order}', [OrderController::class, 'show'])->name('admin.order.show');


});
