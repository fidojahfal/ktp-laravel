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

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', 'App\Http\Controllers\UserController@viewLogin')->name('user.viewLogin');
Route::post('/login', 'App\Http\Controllers\UserController@login')->name('user.login');
Route::get('/register', 'App\Http\Controllers\UserController@viewRegister')->name('user.viewRegister');
Route::post('/register', 'App\Http\Controllers\UserController@register')->name('user.register');
Route::get("/logout", "App\Http\Controllers\UserController@logout")->name("user.logout");
Route::get('/admin/user', 'App\Http\Controllers\UserController@index')->name('user');
Route::delete('/admin/user/delete/{id}', 'App\Http\Controllers\UserController@delete')->name('user.delete');
Route::get('/admin/edit/{id}', 'App\Http\Controllers\UserController@viewEdit')->name('user.viewEdit');
Route::put('/admin/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('user.edit');
Route::get('/user', 'App\Http\Controllers\UserController@getUser')->name('user.getUser');
Route::get('/user/{id}', 'App\Http\Controllers\UserController@getUserById')->name('user.getUserById');

Route::get('/admin/ktp', 'App\Http\Controllers\Data_KtpController@index')->name('data_ktp.index');
Route::delete('/admin/ktp/delete/{id}', 'App\Http\Controllers\Data_KtpController@delete');
Route::get('/ktp', 'App\Http\Controllers\Data_KtpController@getKtp')->name('data_ktp.getKtp');
Route::get('/admin/add', 'App\Http\Controllers\Data_KtpController@viewAddData')->name('data_ktp.viewAdd');
Route::post('/admin/add', 'App\Http\Controllers\Data_KtpController@addData')->name('data_ktp.add');

Route::get('/ktp/pdf/download', 'App\Http\Controllers\FileController@downloadPdfKtp')->name('data_ktp.download');
Route::get('/user/pdf/download', 'App\Http\Controllers\FileController@downloadPdfUser')->name('user.download');
Route::get('/ktp/excel/download', 'App\Http\Controllers\FileController@exportKtp')->name('data_ktp.export');
Route::get('/user/excel/download', 'App\Http\Controllers\FileController@exportUser')->name('user.export');

Route::get('/send/{email}', 'App\Http\Controllers\MailController@send')->name('email');