<?php

use Illuminate\Support\Facades\Route;
Auth::routes();
Route::get('/exit', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('login');
})->name('log_out');
Route::get('/','HomeController@index')->name('index');
Route::get('/home','HomeController@index')->name('home');
