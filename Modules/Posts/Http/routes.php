<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Posts\Http\Controllers'], function()
{
    Route::get('/blurb/list', 'PostsController@frontend')->name('blurbs');
    Route::get('/blurb/{slug}', 'PostsController@display');


    Route::group(['middleware' => 'isAdmin'], function()
    {

      Route::get('/admin/posts', 'PostsController@index')->name('post.index');
      Route::get('/admin/post/create', 'PostsController@create')->name('post.create');
      Route::put('/admin/post/store', 'PostsController@store')->name('post.store');
      Route::get('/admin/post/{id}/edit', 'PostsController@edit')->name('post.edit');
      Route::put('/admin/post/{id}/update', 'PostsController@update')->name('post.update');
      Route::delete('/admin/post/{id}/destroy', 'PostsController@destroy')->name('post.destroy');




  });


});
