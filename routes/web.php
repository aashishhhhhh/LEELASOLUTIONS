<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PageTypeController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();
Route::group(['middleware'=>'auth'],function(){ 
    Route::prefix('admin')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('page-type', PageTypeController::class)->except(['edit']);
        Route::get('disable/{page}',[PageTypeController::class,'disable'])->name('disable');
        Route::get('enable/{page}',[PageTypeController::class,'enable'])->name('enable');



        //Site Settings--------------
        Route::get('contact-info-list',[SettingsController::class,'contactInfoList'])->name('contact-info-list');
        Route::get('studio-list',[SettingsController::class,'studioList'])->name('studio-list');

        //Site Settings----------

    });
});