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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::get('/', 'FrontController@index')->name('index');



//后台管理系统
Route::group(['middleware' => ['auth'], 'prefix' => 'zcjy'], function () {
	//后台首页
	//Route::get('/', 'PostController@index');

});







