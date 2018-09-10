<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Shop\Http\Controllers'], function()
{
    Route::get('/shop', 'ShopController@frontend')->name('storefront');
    Route::get('/product/{id}', 'ShopController@show')->name('product');

    Route::group(['middleware' => 'isAdmin'], function()
    {
    	Route::get('/admin/shop', 'ShopController@index')->name('shop.index');
    	Route::get('/admin/product/create', 'ShopController@create')->name('product.create');
    	Route::put('/admin/product/store', 'ShopController@store')->name('product.store');
    	Route::get('/admin/product/{id}/edit', 'ShopController@edit')->name('product.edit');
    	Route::put('/admin/product/{id}/update', 'ShopController@update')->name('product.update');
    	Route::delete('/admin/product/{id}/destroy', 'ShopController@destroy')->name('product.destroy');

    });

});
