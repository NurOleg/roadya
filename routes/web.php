<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PlacemarkController;
use App\Http\Controllers\Admin\ServiceController;

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

Route::get('/swagger', function () {
    return view('swagger');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'loginForm'])->name('login_form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [LoginController::class, 'registerForm'])->name('register_form');
    Route::post('/register', [LoginController::class, 'register'])->name('register');
    Route::view('/establishment', 'admin.establishment')->name('establishment');

    Route::group(['middleware' => 'auth', 'namespace' => 'admin'], function () {
        Route::group(['prefix' => 'placemark'], function () {
            Route::get('/', [PlacemarkController::class, 'index'])->name('placemark_index');
            Route::get('/create', [PlacemarkController::class, 'create'])->name('placemark_create');
            Route::post('/store', [PlacemarkController::class, 'store'])->name('placemark_store');
            Route::get('/update/{placemark}', [PlacemarkController::class, 'detail'])->name('placemark_detail');
            Route::post('/update/{placemark}', [PlacemarkController::class, 'update'])->name('placemark_update');
            Route::delete('/delete/{placemark}', [PlacemarkController::class, 'delete'])->name('placemark_delete');
            Route::get('/tags', [PlacemarkController::class, 'tags']);
        });

        Route::group(['prefix' => 'service'], function () {
            Route::get('/', [ServiceController::class, 'index'])->name('service_index');
            Route::get('/create', [ServiceController::class, 'create'])->name('service_create');
            Route::post('/store', [ServiceController::class, 'store'])->name('service_store');
            Route::get('/update/{id}', [ServiceController::class, 'detail'])->name('service_detail');
            Route::post('/update/{id}', [ServiceController::class, 'update'])->name('service_update');
            Route::delete('/delete/{id}', [ServiceController::class, 'delete'])->name('service_delete');
        });
    });

});

