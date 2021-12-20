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

Route::get('/', function () {  return redirect(route('qrcode.index')); });
Route::get('/generate','App\Http\Controllers\QRcodeController@index')->name('qrcode.index');
Route::get('/scan', 'App\Http\Controllers\QRcodeController@scan')->name('qrcode.scan');
Route::post('/generate', 'App\Http\Controllers\QRcodeController@generate')->name('qrcode.generate');
Route::get('/download/{type}', 'App\Http\Controllers\QRcodeController@download')->name('qrcode.download');
