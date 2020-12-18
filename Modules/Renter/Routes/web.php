<?php

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
// Route::get('/index', 'RenterController@index')->name('renter.index');
Route::prefix('renter')->group(function() {
    // Route::get('/index', 'RenterController@index')->name('renter.index');
    Route::get('/login', 'Auth\LoginController@FormLogin')->name('renter.form_login');
    Route::post('/login', 'Auth\LoginController@Login')->name('renter.post_login');

    Route::group(['middleware' => ['auth:renter']] , function() {
        Route::get('/logout', 'Auth\LoginController@logout')->name('renter.logout');
        
        Route::get('/index', 'RenterController@index')->name('renter.index');
    });
});
