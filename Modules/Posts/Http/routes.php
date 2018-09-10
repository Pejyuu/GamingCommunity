<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Posts\Http\Controllers'], function()
{
    Route::get('/blurbs', 'PostsController@frontend')->name('blurbs');
    Route::get('/blurb/archive', 'PostsController@archive')->name('blurb.archive');
    Route::get('/blurb/{slug}', 'PostsController@display');


    Route::group(['middleware' => 'auth'], function()
    {
      Route::put('/comment/store', 'CommentsController@store')->name('comment.store');
    });


    Route::group(['middleware' => 'isAdmin'], function()
    {

      Route::get('/admin/posts', 'PostsController@index')->name('post.index');
      Route::get('/admin/post/create', 'PostsController@create')->name('post.create');
      Route::put('/admin/post/store', 'PostsController@store')->name('post.store');
      Route::get('/admin/post/{id}/edit', 'PostsController@edit')->name('post.edit');
      Route::put('/admin/post/{id}/update', 'PostsController@update')->name('post.update');
      Route::delete('/admin/post/{id}/destroy', 'PostsController@destroy')->name('post.destroy');


      Route::delete('/comment/{id}/destroy', 'CommentsController@destroy')->name('comment.destroy');


      Route::get('/admin/post/categories', 'CategoriesController@index')->name('category.index');
      Route::get('/admin/post/category/create', 'CategoriesController@create')->name('category.create');
      Route::put('/admin/post/category/store', 'CategoriesController@store')->name('category.store');

      Route::get('/admin/post/category/{id}/edit', 'CategoriesController@edit')->name('category.edit');
      Route::put('/admin/post/category/{id}/update', 'CategoriesController@update')->name('category.update');
      Route::delete('/admin/post/category/{id}/destroy', 'CategoriesController@destroy')->name('category.destroy');


      Route::get('/admin/post/tags', 'CategoriesController@index')->name('tag.index');
      Route::get('/admin/post/tag/create', 'CategoriesController@create')->name('tag.create');





  });


});
