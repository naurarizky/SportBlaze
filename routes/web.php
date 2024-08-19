<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\DashboardController as ControllersDashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NewsController;
use App\Models\DetailNews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index');
    });

    

    Route::controller(HomeController::class)->group(function(){
        Route::get('/', 'index')->name('home');
    });

    // News
    Route::controller(AdminNewsController::class)->group(function () {
        Route::get('news', 'index')->name('news-index');
        Route::get('/news/create', 'create')->name('news-create');
        Route::post('/news/store', 'store')->name('news-store');
        Route::get('/news/edit/{news}', 'edit')->name('news-edit');
        Route::put('/news/update/{news}', 'update')->name('news-update');
        Route::get('/news/delete/{news}', 'delete')->name('news-delete');
        Route::get('/news/{id}', 'show')->name('show');
    });

    // Slider
    Route::controller(SliderController::class)->group(function () {
        Route::get('/slider', 'index')->name('slider-index');
        Route::get('/slider/create', 'create')->name('slider-create');
        Route::post('/slider/store', 'store')->name('slider-store');
        Route::get('/slider/edit/{slider}', 'edit')->name('slider-edit');
        Route::put('/slider/edit/{slider}', 'update')->name('slider-update');
        Route::get('/slider/delete/{slider}', 'delete')->name('slider-delete');
    });

    
});
