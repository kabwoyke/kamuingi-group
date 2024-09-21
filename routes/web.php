<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("/admin");
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
            Route::get('members/add/' , 'render_add_member_form')->name('add_member_form');
            Route::get('members/export/' , 'export_excel')->name('export_excel');
            Route::post('members/add/' , 'store_member')->name('store_member');
            Route::get('deceased/add/{id}' ,'render_deceased_form')->name('deceased_form');
            Route::get('members/deceased/add/{id}' , 'mark_deceased')->name('mark_deceased');
            Route::get("members/{id}" , 'render_member_details_page')->name('member_details_page');
            Route::get('members/edit/{id}' , 'render_update_form')->name('update_form');
            Route::patch('members/update/{id}' , 'update')->name('update');
            Route::post('members/deceased/add/{id}' , 'add_deceased')->name('add_deceased');

        Route::controller(DonationController::class)->group(function(){
            Route::get('donations' ,'render_donations_page')->name('donation_page');
            Route::post('donations/{deceasedId}' , 'store_donation')->name('store_donation');
            Route::get('donations/new/{deceasedId}' ,'render_donation_form')->name('donation_form');
            Route::get('donations/progress/{deceasedId}' ,'render_donation_progress')->name('donation_progress_page');
            Route::get('donations/search/member/{query}' ,'search')->name('search_member')->withoutMiddleware(['auth']);
        });



        });
    });

});


