<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;

// Route::get('/', function () {
//     return view('admin.home.index');
// });

// we need to create middleware for isAdminMiddleware
// Route::group(['middleware' => ['auth:admin']], function() {
//     Route::get('/users', [UserController::class, 'users']);
// });
Route::group(['as'=>'admin.'], function(){
    

    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
                    ->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware('isAdmin')->group(function () {

        Route::get('/', [HomeController::class, 'index'])
                    ->name('home');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->name('logout');
    });


});

