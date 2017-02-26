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

		Route::group(['prefix' => '/{category}'], function() {
			Route::get('/listings', [
				'uses' => 'Listing\ListingController@index',
				'as' => 'listings.index'
			]);
		});
	});

	/**
	 * Listings
	 */

	Route::group(['prefix' => '/listing', 'namespace' => 'Listing'], function() {
		
		Route::post('/{listing}/favourites', [
			'uses' => 'ListingFavouriteController@store'
			'as' => 'listings.favourites.store'
		]);
		
	});

	Route::get('/{listing}', [
		'uses' => 'Listing\ListingController@show',
		'as' => 'listings.show'
	]);


});