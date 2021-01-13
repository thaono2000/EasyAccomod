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

Route::prefix('owner')->group(function() {
    Route::get('/login', 'Auth\LoginController@FormLogin')->name('owner.form_login');
    Route::post('/login', 'Auth\LoginController@login')->name('owner.post_login');

    Route::get('/register', 'Auth\RegisterController@showFormRegister')->name('owner.form_register');
    Route::post('/register', 'Auth\RegisterController@Register')->name('owner.post_register');

    Route::group(['middleware' => ['auth:owner']] , function() {
        Route::get('/badinh', function () {
            return view('owner::review.quanbadinh');
        })->name('owner.badinh');
        
        Route::get('/caugiay', function () {
            return view('owner::review.quancaugiay');
        })->name('owner.caugiay');
        
        Route::get('/dongda', function () {
            return view('owner::review.quandongda');
        })->name('owner.dongda');
        
        Route::get('/haibatrung', function () {
            return view('owner::review.quanhaibatrung');
        })->name('owner.haibatrung');
        
        Route::get('/hoangmai', function () {
            return view('owner::review.quanhoangmai');
        })->name('owner.hoangmai');
        
        Route::get('/hoankiem', function () {
            return view('owner::review.quanhoankiem');
        })->name('owner.hoankiem');
        
        Route::get('/longbien', function () {
            return view('owner::review.quanlongbien');
        })->name('owner.longbien');
        
        Route::get('/namtuliem', function () {
            return view('owner::review.quannamtuliem');
        })->name('owner.namtuliem');
        
        Route::get('/tayho', function () {
            return view('owner::review.quantayho');
        })->name('owner.tayho');
        
        Route::get('/thanhxuan', function () {
            return view('owner::review.quanthanhxuan');
        })->name('owner.thanhxuan');

        Route::get('/logout', 'Auth\LoginController@logout')->name('owner.logout');
        Route::get('/index', 'OwnerController@index')->name('owner.index');
        Route::get('/list', 'OwnerController@listMotel')->name('owner.list_motel');
        Route::get('/detail/{id}', 'OwnerController@detailMotel')->name('owner.detail_motel');

        Route::get('/likelists', 'OwnerController@likeLists')->name('owner.like_list');
        Route::get('/likes/{id}', 'OwnerController@likes')->name('owner.like_post');
        Route::get('/dislikes/{id}', 'OwnerController@dislikes')->name('owner.dislike_post');

        Route::post('/report/{id}', 'OwnerController@report');

        Route::get('/post', 'OwnerController@formPost')->name('owner.form_post');
        Route::post('/post', 'OwnerController@postMotel')->name('owner.post_motel');

        Route::post('/review/{id}', 'OwnerController@review');

        Route::post('/update/{id}', 'OwnerController@updateInformation');

        Route::get('/information', 'OwnerController@formInformation')->name('owner.form_information');
        Route::get('/myMotel', 'OwnerController@myMotel')->name('owner.my_motel');
        Route::get('/edit/{id}', 'OwnerController@formEdit');
        Route::post('/edit/{id}', 'OwnerController@editMotel')->name('owner.edit_motel');
        Route::post('extend/{id}', 'OwnerController@extend');

        Route::get('/notification', 'OwnerController@notification')->name('owner.notification');

        Route::get('/isRead/{id}', 'OwnerController@isRead');

        Route::get('/adminNotification/{id}', 'OwnerController@adminNotification');
        Route::get('/extendNotification/{id}', 'OwnerController@extendNotification');
    });
});
