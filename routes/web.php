<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
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




Route::middleware(['GuestOnly'])->group(function () {
    # isi buat yang cuma diakses guest
    Route::get('/', [UserController::class, "index"])
        ->name("guest_home");

    Route::get('/login', [UserController::class, 'loadLoginPage'])
        ->name("guest_login");
    Route::post('/login', [UserController::class, 'login']);

    Route::get('/register', [UserController::class, 'loadRegisterPage'])
        ->name("guest_register");
    Route::post('/register', [UserController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    # isi yang bisa diakses admin & user (home, detail, profile, logout)
    Route::get("/home", [ItemController::class, "loadItemPage"])
        ->name("item_home_page");

    Route::get("/logout", [UserController::class, "logOut"])
        ->name("logout");

    Route::get("/profile", [UserController::class, "loadProfile"])
        ->name("profile");

    Route::patch('/edit-profile', [UserController::class, "editProfile"]);

    Route::get("/saved", [UserController::class, "loadSavedPage"])
        ->name("saved");

    Route::get("/item/{itemId}", [ItemController::class, "viewItemById"])
        ->name("item_detail_page");

    Route::get("/cart", [OrderController::class, "loadCartPage"])
        ->name("cart_page");

    Route::post("/add-to-cart/{itemId}", [OrderController::class, "addItemToCart"])
        ->name("add_item_to_cart");

    Route::delete("/remove-cart/{itemId}", [OrderController::class, "removeItemFromCart"])
        ->name("remove_item_from_cart");

    Route::delete("/checkout", [OrderController::class, "checkoutCart"])
        ->name("checkout_cart");

    Route::get("/checkout-success", [OrderController::class, "loadSuccessPage"])
        ->name("checkout_success");

    Route::middleware(['AdminOnly'])->group(function () {
        # isi buat yang bisa diakses admin aja (account maintenance)

    });

    Route::middleware(['UserOnly'])->group(function () {
        # isi buat yang bisa diakses sama user doang (cart, halaman success)

    });
});
