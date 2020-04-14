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

Route::get('/', 'BaseController@index');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
	Route::group(['prefix' => 'Administrator'], function () {
		Route::group(['middleware' => ['role:Administrator']], function () {
			Route::get('/', 'Admin\MainController@index')->name('admin.index');
		});
	}); 
});

Route::group(['middleware' => ['auth']], function () {
	Route::group(['prefix' => 'Employee'], function () {
		Route::group(['middleware' => ['role:Employee']], function () {
			Route::get('/', 'Employee\MainController@index')->name('employee.index');
		});
	}); 
});

Route::group(['middleware' => ['auth']], function () {
	Route::group(['prefix' => 'Owner'], function () {
		Route::group(['middleware' => ['role:Owner']], function () {
			Route::get('/', 'Owner\MainController@index')->name('owner.index');
		});
	}); 
});
