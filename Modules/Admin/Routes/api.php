<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/posts', function () {
    $accounts = User::create([
        'name' => 'thao',
        'email' => 'thao1234@gmail.com',
        'password' => '123456'
    ]);
    
    return $accounts;
});

Route::get('/gets', 'AccountController@show')->name('accounts.show');

Route::post('/updates', 'AccountController@update')->name('accounts.update');


Route::middleware('auth:api')->get('/admin', function (Request $request) {
    return $request->user();
});

