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

	Route::group(['prefix' => '/listings', 'namespace' => 'Listing'], function() {
		
		Route::get('/favourites', [
			'uses' => 'ListingFavouriteController@index',
			'as' => 'listings.favourites.index'
		]);

		Route::post('/{listing}/favourites', [
			'uses' => 'ListingFavouriteController@store',
			'as' => 'listings.favourites.store'
		]);

		Route::delete('/{listing}/favourites', [
			'uses' => 'ListingFavouriteController@destroy',
			'as' => 'listings.favourites.destroy'
		]);

		Route::get('/viewed', [
			'uses' => 'ListingViewedController@index',
			'as' => 'listings.viewed.index'
		]);

		Route::post('/contact', [
			'uses' => 'ListingContactController@store',
			'as' => 'listings.contact.store'
		]);

	});

	Route::get('/{listing}', [
		'uses' => 'Listing\ListingController@show',
		'as' => 'listings.show'
	]);


});