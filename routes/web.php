<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Auth\Middleware\Authenticate;
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

        Route::get('/auth/signout' , 'logout')->name('logout');

    });
});



Route::controller(AdminController::class)->group(function(){
    Route::middleware(Authenticate::class)->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::get('' ,'render_dashboard_page')->name('dashboard_page');
            Route::get('deceased/add' ,'render_deceased_form')->name('deceased_form');
            Route::get('members/deceased/add/{id}' , 'mark_deceased')->name('mark_deceased');
            Route::get('members/edit/{id}' , 'render_update_form')->name('update_form');

        });
    });

});


