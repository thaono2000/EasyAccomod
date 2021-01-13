<?php

use Illuminate\Support\Facades\Route;
use App\Models\Motel;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/badinh', function () {
    return view('review.quanbadinh');
})->name('review.badinh');

Route::get('/caugiay', function () {
    return view('review.quancaugiay');
})->name('review.caugiay');

Route::get('/dongda', function () {
    return view('review.quandongda');
})->name('review.dongda');

Route::get('/haibatrung', function () {
    return view('review.quanhaibatrung');
})->name('review.haibatrung');

Route::get('/hoangmai', function () {
    return view('review.quanhoangmai');
})->name('review.hoangmai');

Route::get('/hoankiem', function () {
    return view('review.quanhoankiem');
})->name('review.hoankiem');

Route::get('/longbien', function () {
    return view('review.quanlongbien');
})->name('review.longbien');

Route::get('/namtuliem', function () {
    return view('review.quannamtuliem');
})->name('review.namtuliem');

Route::get('/tayho', function () {
    return view('review.quantayho');
})->name('review.tayho');

Route::get('/thanhxuan', function () {
    return view('review.quanthanhxuan');
})->name('review.thanhxuan');

Route::get('/listMotel', function () {
    return view('list_motel', ['motels' => Motel::paginate(5)]);
})->name('list_motel');

Route::get('/detail/{id}', function ($id) {
    return view('detail', ['motel' => Motel::find($id)]);
})->name('detail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

