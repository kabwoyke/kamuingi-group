<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;
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
            Route::get('deceased/add/{id}' ,'render_deceased_form')->name('deceased_form');
            Route::get('members/deceased/add/{id}' , 'mark_deceased')->name('mark_deceased');
            Route::get('members/edit/{id}' , 'render_update_form')->name('update_form');
            Route::patch('members/update/{id}' , 'update')->name('update');
            Route::post('members/deceased/add/{id}' , 'add_deceased')->name('add_deceased');
            Route::controller(DonationController::class)->group(function(){
                Route::get('donations' ,'render_donations_page')->name('donation_page');
                Route::get('donations/new/{id}' ,'render_donation_form')->name('donation_form');
            });

        });
    });

});


