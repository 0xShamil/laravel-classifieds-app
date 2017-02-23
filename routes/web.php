<?php

Route::get('/', [
	'uses' => 'HomeController@index',
]);

Auth::routes();

Route::get('/user/area/{area}', [
	'uses' => 'User\AreaController@store',
	'as' => 'user.area.store'
]);