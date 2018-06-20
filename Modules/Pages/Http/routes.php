<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Pages\Http\Controllers'], function()
{
    Route::get('/p/{slug}', 'PagesController@display');

    Route::group(['middleware' => 'isAdmin'], function()
    {

      Route::get('/admin/pages', 'PagesController@index')->name('page.index');
      Route::get('/admin/page/create', 'PagesController@create')->name('page.create');
      Route::put('/admin/page/store', 'PagesController@store')->name('page.store');
      Route::get('/admin/page/{id}/edit', 'PagesController@edit')->name('page.edit');
      Route::put('/admin/page/{id}/update', 'PagesController@update')->name('page.update');
      Route::delete('/admin/page/{id}/destroy', 'PagesController@destroy')->name('page.destroy');




  });


});
