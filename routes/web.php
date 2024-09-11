<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::controller(AuthController::class)->group(function(){

    Route::prefix('/auth')->group(function(){

        Route::get('login' ,'render_login_page')->name('login_page');

        Route::get('signup' , 'render_signup_page')->name('register_page');

        Route::post('signup' , 'signup')->name('signup');

        Route::post('login' , 'login')->name('login');

    });
});
