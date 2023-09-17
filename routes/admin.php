<?php

use App\Http\Controllers\Admin\FaqController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FaqAnswerContorller;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProductContorller;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TagController;


Route::group(['as'=>'admin.'], function(){


    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
                    ->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware('isAdmin')->group(function () {

        Route::get('/', [HomeController::class, 'index'])
                    ->name('home');

        Route::resource('/categories', CategoryController::class)->except(['show']);
        Route::resource('/tags', TagController::class)->except(['show']);
        Route::resource('/branches', BranchController::class)->except(['show']);

        Route::resource('/products', ProductContorller::class)->except(['show']);

        Route::resource('/faq', FaqController::class)->except(['show']);

        Route::resource('/sliders', SliderController::class)->except(['show','edit','update']);
        Route::get('sliders/updateStatus/{slider}/{status}', [SliderController::class, 'updateStatus'])
        ->name('sliders.updateStatus');

        Route::resource('/banners', BannerController::class)->except(['show','edit','update']);
        Route::get('banners/updateStatus/{banner}/{status}', [BannerController::class, 'updateStatus'])
        ->name('banners.updateStatus');

        Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
        Route::delete('/messages/destroy/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->name('logout');
    });


});

