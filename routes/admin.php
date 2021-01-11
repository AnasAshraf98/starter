<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\UserController;

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

Route::get('/admin', function () {
    return "hello anas";
});


Route::namespace('Front')->group(function(){
    Route::get('users',[UserController::class,'showUserName']);
});

Route::get('check',function(){
    return "middleware";
})->middleware('auth');


Route::group(['prefix' => 'users','middleware' => 'auth'],function(){
    Route::get('/',function(){
        return 'work';
    });
    Route::get('show',[UserController::class,'showUserName']);
});
