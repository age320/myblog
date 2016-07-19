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




Route::get('/', 'ArticleController@index');
Route::resource('article','ArticleController');
Route::resource('category','CategoryController');
Route::get('/category/{id}',['as'=>'cate_article', 'uses'=>'CategoryController@index']);
Route::controller('search','SearchController');

//Route::get('haha','backend\HomeController@index');
Route::group(['middleware' => 'auth', 'prefix' => 'backend'], function() {
    Route::get('/', 'backend\ArticleController@index');
    Route::resource('article','backend\ArticleController');
    Route::resource('category','backend\CategoryController');
});
Route::auth();



Route::group(['middleware' => 'auth', 'prefix' => 'zhaotanjia'], function() {
	Route::get('love','zhaotanjia\ImpressController@index');
});
