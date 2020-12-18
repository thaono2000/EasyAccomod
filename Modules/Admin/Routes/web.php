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

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\LoginController@FormLogin')->name('admin.form_login');
    Route::post('/login', 'Auth\LoginController@Login')->name('admin.post_login');
    Route::get('/logout', 'Auth\LoginController@Logout')->name('admin.logout');

     Route::group(['middleware' => ['auth:admin']] , function() {
        Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');
        
        Route::get('/home', 'HomeController@home')->name('admin.admins_home');
        Route::get('/accountSuccess', 'AccountController@successListAccount')->name('admin.accounts.success_list_account');
        Route::get('/accountWait', 'AccountController@waitListAccount')->name('admin.accounts.wait_list_account');
        Route::get('/approvalAccount/{id}', 'AccountController@approvalAccount')->name('admin.accounts.approval_account');

        Route::get('/postSuccess', 'PostController@successListPost')->name('admin.posts.list_success_post');
        Route::get('/postWait', 'PostController@waitListPost')->name('admin.posts.list_wait_post');
        Route::get('/postRefuse', 'PostController@refuseListPost')->name('admin.posts.list_refuse_post');
        Route::get('/refusePost/{id}', 'PostController@refusePost')->name('admin.posts.refuse_post');
        Route::get('/postCreate', 'PostController@createPost')->name('admin.posts.create_post');
        Route::get('/approvalPost/{id}', 'PostController@approvalPost')->name('admin.posts.approval_post');
        Route::post('/postAdd', 'PostController@addPost')->name('admin.posts.add_post');
        Route::get('/formEditPost/{id}', 'PostController@formPost')->name('admin.posts.form_post');
        Route::post('/editPost/{id}', 'PostController@editPost')->name('admin.posts.edit_post');
    });
});
