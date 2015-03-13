<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

/* 带注册的登录
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/

//不带注册的登录
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//PagesAdmin路由
Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	//权限验证
	'middleware' => 'auth'
	],
	function(){
		//由于prefix设置为admin 所以这里的/实际是admin/
		Route::get('/', 'AdminHomeController@index');
		Route::resource('pages', 'PagesController');
	}
);