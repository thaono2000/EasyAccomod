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
Route::prefix('renter')->group(function() {
    Route::get('/login', 'Auth\LoginController@FormLogin')->name('renter.form_login');
    Route::post('/login', 'Auth\LoginController@Login')->name('renter.post_login');
    Route::get('/register', 'Auth\RegisterController@showFormRegister')->name('renter.form_register');
    Route::post('/register', 'Auth\RegisterController@register')->name('renter.post_register');

    Route::group(['middleware' => ['auth:renter']] , function() {
        Route::get('/badinh', function () {
            return view('renter::review.quanbadinh');
        })->name('renter.badinh');
        
        Route::get('/caugiay', function () {
            return view('renter::review.quancaugiay');
        })->name('renter.caugiay');
        
        Route::get('/dongda', function () {
            return view('renter::review.quandongda');
        })->name('renter.dongda');
        
        Route::get('/haibatrung', function () {
            return view('renter::review.quanhaibatrung');
        })->name('renter.haibatrung');
        
        Route::get('/hoangmai', function () {
            return view('renter::review.quanhoangmai');
        })->name('renter.hoangmai');
        
        Route::get('/hoankiem', function () {
            return view('renter::review.quanhoankiem');
        })->name('renter.hoankiem');
        
        Route::get('/longbien', function () {
            return view('renter::review.quanlongbien');
        })->name('renter.longbien');
        
        Route::get('/namtuliem', function () {
            return view('renter::review.quannamtuliem');
        })->name('renter.namtuliem');
        
        Route::get('/tayho', function () {
            return view('renter::review.quantayho');
        })->name('renter.tayho');
        
        Route::get('/thanhxuan', function () {
            return view('renter::review.quanthanhxuan');
        })->name('renter.thanhxuan');
        
        Route::get('/logout', 'Auth\LoginController@logout')->name('renter.logout');
        Route::get('/index', 'RenterController@index')->name('renter.index');
        Route::get('/list', 'RenterController@listMotel')->name('renter.list_motel');
        Route::get('/detail/{id}', 'RenterController@detailMotel')->name('renter.detail_motel');

        Route::get('/likelists', 'RenterController@likeLists')->name('renter.like_list');
        Route::get('/likes/{id}', 'RenterController@likes')->name('renter.like_post');
        Route::get('/dislikes/{id}', 'RenterController@dislikes')->name('renter.dislike_post');

        Route::post('/report/{id}', 'RenterController@report');

        Route::post('/review/{id}', 'RenterController@review');

        Route::get('/information', 'RenterController@formInformation')->name('renter.form_information');
        Route::post('/update/{id}', 'RenterController@updateInformation');
    });
});
