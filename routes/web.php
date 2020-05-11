<?php
use Illuminate\Support\Facades\Route;
Auth::routes();
Route::get('/exit', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('login');
})->name('log_out');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/view/{id}', 'HomeController@view')->name('view');
//Route::get('/deneme',function (){
//   return dd(Ayar::pluck('value','name')->all());
//});

Route::group(['middleware'=>['admin_mi','auth']],function (){
    Route::group(['namespace'=>'Admin'],function (){
        Route::resource('user','UserController');
        Route::resource('post','PostController');
        Route::post('post/status_change','PostController@s');
        Route::get('/talep','TalepController@index');
        Route::get('/talep/status_change','TalepController@status_change');
        Route::delete('/talep/{id}','TalepController@destroy')->name('talep.destroy');
    }) ;
});
//Route::group(['middleware'=>['yazar_mi','auth']],function (){
//    Route::group(['namespace'=>'Yazar'],function (){
//        Route::resource('post','PostController');
//    }) ;
//});
Route::get('/yazarlik_talebi','YazarlikTalepController@index');
Route::post('/yazarlik_talebi/send','YazarlikTalepController@send');
