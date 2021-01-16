<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Auth;
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




Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/',function(){
    return 'Home';
});

Route::get('/dashboard',function(){
    return 'dashboard';
});

Route::get('fillable',[CrudController::class,'getOffers']);


Route::group(['prefix' => Localization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){
    Route::group(['prefix' => 'offers'],function(){
        Route::get('create',[CrudController::class,'create']);
        Route::post('store',[CrudController::class,'store'])->name('offers.store');
    });

});
