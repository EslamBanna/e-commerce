<?php

// use App\Http\Controllers\Site\Site;

use App\Http\Controllers\Admin\vendorsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// define('PAGINATION_COUNT', 10);
Route::group(['middleware' => 'auth:vendor'], function () {
    #################### start dashboard ########################
    Route::get('/indexVendor',[vendorsController::class,'eslam']);

    // Route::get('/hi',[vendorsController::class,'eslam']);
    #################### end dashboard ########################


});

Route::group(['middleware' => 'guest:vendor'], function () {
    Route::get('/login',[vendorsController::class,'login'])->name('vendor.login');
    Route::post('/check-login',[vendorsController::class,'checkLogin'])->name('vendor.check.login');

});

// Route::get('/dashboard', [Admin::class, 'indexPage'])->name('admin.dashboard');
