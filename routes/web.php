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

//API请求
Route::group(['prefix'=>'api'], function () {
	//根据题目id获取它的选项
	Route::get('get_info_select/{id}/{status?}','ApiController@getInfoSelectById');
});


Auth::routes();


Route::get('/', 'FrontController@index')->name('index');



//后台管理系统
Route::group(['middleware' => ['auth'], 'prefix' => 'online'], function () {
	//后台首页
	Route::get('/home', 'HomeController@index');

});



Route::resource('informations', 'InformationsController');

Route::resource('attachInformations', 'AttachInformationsController');

Route::resource('recountInformations', 'RecountInformationsController');

Route::resource('results', 'ResultController');