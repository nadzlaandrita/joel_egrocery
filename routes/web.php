<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware(['GuestOnly'])->group(function(){
    # isi buat yang cuma diakses guest
    Route::get('/', [UserController::class, "index"]);
});

Route::middleware(['auth'])->group(function(){
    # isi yang bisa diakses admin & user (home, detail, profile, logout)

    Route::middleware(['AdminOnly'])->group(function(){
        # isi buat yang bisa diakses admin aja (account maintenance)

    });

    Route::middleware(['UserOnly'])->group(function(){
        # isi buat yang bisa diakses sama user doang (cart, halaman success)

    });
});
