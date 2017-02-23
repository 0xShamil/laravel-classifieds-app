<?php

Route::get('/', [
	'uses' => 'HomeController@index',
]);

Auth::routes();

Route::get('/user/area/{area}', [
	'uses' => 'User\AreaController@store',
	'as' => 'user.area.store'
]);

Route::group(['prefix' => '/{area}'], function() {

	/**
	 * Category
	 */

	Route::group(['prefix' => '/categories'], function(){
		Route::get('/', [
			'uses' => 'Category\CategoryController@index',
			'as' => 'category.index'
		]);
	});

});