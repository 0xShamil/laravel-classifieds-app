<?php

Route::get('/', [
	'uses' => 'HomeController@index',
]);

Auth::routes();

Route::get('/braintree/token', [
	'uses' => 'Payment\BraintreePaymentController@token'
]);

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

		Route::post('/{listing}/contact', [
			'uses' => 'ListingContactController@store',
			'as' => 'listings.contact.store'
		]);

		/**
		 * Payment
		 */
		Route::get('/{listing}/payment', 'ListingPaymentController@show')->name('listings.payment.show');
		Route::post('/{listing}/payment', 'ListingPaymentController@store')->name('listings.payment.store');
		Route::patch('/{listing}/payment', 'ListingPaymentController@update')->name('listings.payment.update');
		
		/**
		 * Unpublished
		 */
		Route::get('/unpublished', 'ListingUnpublishedController@index')->name('listings.unpublished.index');
		Route::get('/published', 'ListingPublishedController@index')->name('listings.published.index');

		/**
		 * Listing CRUD
		 */
		Route::group(['middleware' => 'auth'], function () {
            Route::get('/create', 'ListingController@create')->name('listings.create');
            Route::post('/', 'ListingController@store')->name('listings.store');

            Route::get('/{listing}/edit', 'ListingController@edit')->name('listings.edit');
            Route::patch('/{listing}', 'ListingController@update')->name('listings.update');
            Route::delete('/{listing}', 'ListingController@destroy')->name('listings.destroy');
            
        });

	});

	Route::get('/{listing}', [
		'uses' => 'Listing\ListingController@show',
		'as' => 'listings.show'
	]);


});