<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BrancheController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\RefundPolicyController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SingleProductController;


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

Route::group(['as'=>'front.'], function(){

    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::get('/about', [AboutController::class, 'index'])->name('about.index');

    Route::post('/cart/{id}', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/fav/{id}', [CartController::class, 'addToFav'])->name('cart.addToFav');





    Route::get('/branches', [BrancheController::class, 'index'])->name('branches.index');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

    Route::get('/favourite', [FavouriteController::class, 'index'])->name('favourite.index');

    Route::get('/privcy-policy', [PrivacyPolicyController::class, 'index'])->name('privcy.policy.index');

    Route::get('/refund-policy', [RefundPolicyController::class, 'index'])->name('refund.policy.index');

    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

    Route::get('/single-product/{id}', [SingleProductController::class, 'index'])->name('single.product.index');




    Route::middleware('guest')->group(function () {
        Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    });



    Route::middleware('auth')->group(function () {

        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/details', [OrderController::class, 'details'])->name('orders.details');
        Route::get('/orders/recieved', [OrderController::class, 'recieved'])->name('orders.recieved');
        Route::get('/orders/track', [OrderController::class, 'track'])->name('orders.track');

        Route::get('/checkout', [checkoutController::class, 'index'])->name('checkout.index');

        Route::get('/account/details', [AccountController::class, 'details'])->name('account.details');
        Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');


    });




});
