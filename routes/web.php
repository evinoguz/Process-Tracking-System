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

Route::group(['middleware'=>['manager_İs','auth']],function (){
    Route::group(['namespace'=>'Manager'],function (){
        Route::resource('user','UserController');
        Route::resource('post','PostController');
        Route::resource('product','ProductController');
        Route::resource('step','StepController');
        Route::resource('sub_step','Sub_StepController');
        Route::resource('employees_step','Employees_StepController');
        Route::post('post/status_change','PostController@status_change');
        Route::get('/talep','TalepController@index');
        Route::post('/talep/status_change','TalepController@status_change');
        Route::delete('/talep/{id}','TalepController@destroy')->name('talep.destroy');

    }) ;
});


Route::group(['middleware'=>['employees_İs','auth']],function (){
    Route::group(['namespace'=>'Employees'],function (){
        Route::resource('order_step','Order_StepController');

    }) ;
});


Route::group(['middleware'=>['customer_İs','auth']],function (){
    Route::group(['namespace'=>'Customer'],function (){
        Route::resource('order','OrderController');
    }) ;
});


