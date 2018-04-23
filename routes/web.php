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
Route::group(['prefix'=>'api','namespace'=>'API'], function () {
	//发送邮箱验证码
	Route::get('send_mail_code','ApiController@sendEmailCode');

	//注册用户
	Route::get('reg','ApiController@regNewUser');

	//登录用户
	Route::get('login','ApiController@loginUser');

	//根据题目id获取它的选项
	Route::get('get_info_select/{id}/{status?}','ApiController@getInfoSelectById');

	//必须要经过用户认证后的路由
	Route::group(['prefix'=>'auth'],function(){

		//给题接口
		Route::get('{token}/get_infos/{type?}','ApiController@getInfoApi');
		
		//答题记录接口
		Route::get('{token}/answer_infos','ApiController@AnswerRecountApi');

		//答题结束接口
		Route::get('{token}/stop','ApiController@endInfosApi');

		//错题册
		Route::get('{token}/mistake/{times?}','ApiController@mistakeRecount');

	});
});


Auth::routes();


Route::get('/', 'FrontController@index')->name('index');



//后台管理系统
Route::group(['middleware' => ['auth'], 'prefix' => 'online','namespace'=>'Admin'], function () {
	//后台首页
	Route::get('/home', 'HomeController@index');


});

Route::group(['middleware' => ['auth'],'namespace'=>'Admin'], function () {
	//后台首页
	Route::get('/home', 'HomeController@index');

	Route::resource('informations', 'InformationsController');

	Route::resource('attachInformations', 'AttachInformationsController');

	Route::resource('recountInformations', 'RecountInformationsController');

	Route::resource('results', 'ResultController');

	Route::resource('user', 'UserController');
});



