<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});


Route::prefix('/login')->middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('process-login', [AuthController::class, 'processLogin'])->name('process-login');
});

Route::prefix('/regist')->middleware('guest')->group(function () {
    Route::get('regist', [AuthController::class, 'regist'])->name('regist');
    Route::post('process-regist', [AuthController::class, 'processRegist'])->name('process-regist');
});



Route::group(['middleware' => ['verified', 'auth', 'acl']], function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // // Admin
    // Route::prefix('/admin')->group(function () {
    //     // Menu
    //     Route::resource('menu', \App\Http\Controllers\MenuController::class, ['names' => 'menu']);
    //     Route::get('create-menu', [\App\Http\Controllers\MenuController::class, 'create'])->name('create-menu');
    //     // Route::delete('destroy-menu/{id}', [\App\Http\Controllers\MenuController::class, 'destroy'])->name('destroy-menu');
    //     Route::get('destroy-menu/{id}', [\App\Http\Controllers\MenuController::class, 'destroy'])->name('destroy-menu');
    //     Route::get('data-menu', [\App\Http\Controllers\MenuController::class, 'data'])->name('data-menu');
    //     Route::get('edit-menu/{menu}', [\App\Http\Controllers\MenuController::class, 'edit'])->name('edit-menu');
    //     // Route::put('edit-menu/{menu}', [\App\Http\Controllers\MenuController::class, 'edit'])->name('edit-menu');
    //     Route::put('menu-orderSave', [\App\Http\Controllers\MenuController::class, 'saveOrder'])->name('menu-saveOrder');
    // });
});
