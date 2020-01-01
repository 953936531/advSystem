<?php

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

//Route::get('/', function () {
//    return view('index');
//});


//
//Route::get('astus',function(){
//	return view('stus.index');
//});
//
//Route::resource('stus','Admin\StuController');
//Auth::routes();
Route::get('/login','Home\LoginController@index');
Route::post('/loginVail', 'Home\LoginController@loginVail');
Route::get('/logout', 'Home\LoginController@LoginOut');

Route::group(['prefix'=>'/','middleware'=>'check.login','namespace'=>'Home'],function(){
    Route::get('/', 'IndexController@index');
});



