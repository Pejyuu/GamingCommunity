<?php


Route::group(['middleware' => 'web', 'namespace' => 'Modules\Events\Http\Controllers'], function()
{
    Route::get('/events', 'EventsController@index')->name('events');
    Route::get('/events/feed', 'EventsController@feed')->name('event.feed');
    Route::get('/event/{slug}', 'EventsController@display')->name('event.display');

    Route::put('/event/rsvp/', 'EventsController@rsvp')->name('rsvp');
    Route::delete('/event/rsvp/cancel', 'EventsController@rsvp_cancel')->name('rsvp.cancel');




    Route::group(['middleware' => 'isAdmin'], function()
    {
        Route::get('/admin/events', 'EventsController@adminIndex')->name('event.index');
        Route::get('/admin/event/create', 'EventsController@create')->name('event.create');
        Route::put('/admin/event/store', 'EventsController@store')->name('event.store');
        Route::get('/admin/event/{id}/edit', 'EventsController@edit')->name('event.edit');
        Route::put('/admin/event/{id}/update', 'EventsController@update')->name('event.update');
        Route::delete('/admin/event/{id}/edit', 'EventsController@destroy')->name('event.destroy');


  });


});
