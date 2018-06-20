<?php


Route::group(['middleware' => 'web', 'namespace' => 'Modules\Core\Http\Controllers'], function()
{
  Route::get('/', 'CoreController@index')->name('index');

  Route::get('login', 'AuthController@redirectToProvider')->name('login');
  Route::get('login/callback', 'AuthController@handleProviderCallback');
  Route::get('logout', 'AuthController@logout')->name('logout');


  Route::group(['middleware' => 'isAdmin'], function()
  {



  Route::get('/admin', 'CoreController@dashboard')->name('dashboard');
  Route::get('/admin/gallery', 'CoreController@gallery')->name('gallery');
  Route::get('/admin/filemanager', 'CoreController@filemanager')->name('filemanager');



// # USER ADMINISTRATION
  Route::get('admin/users', 'UserController@index')->name('user.index');
  Route::get('admin/user/{id}/profile', 'UserController@index')->name('user.view');
  Route::get('admin/user/{id}/edit', 'UserController@edit')->name('user.edit');
  Route::put('admin/user/{id}/update', 'UserController@update')->name('user.update');
  Route::delete('admin/user/{id}/destroy', 'UserController@destroy')->name('user.destroy');

  // PERMISSIONS MANAGEMENT
  Route::get('admin/permissions', 'PermissionController@index')->name('permission.index');
  Route::get('admin/permission/create', 'PermissionController@create')->name('permission.create');
  Route::post('admin/permission/store', 'PermissionController@store')->name('permission.store');
  Route::get('admin/permission/{id}/edit', 'PermissionController@edit')->name('permission.edit');
  Route::put('admin/permission/{id}/update', 'PermissionController@update')->name('permission.update');
  Route::delete('admin/permission/{id}/destroy', 'PermissionController@destroy')->name('permission.destroy');

  // ROLES MANAGEMENT
  Route::get('admin/roles', 'RoleController@index')->name('role.index');
  Route::get('admin/role/create', 'RoleController@create')->name('role.create');
  Route::post('admin/role/store', 'RoleController@store')->name('role.store');
  Route::get('admin/role/{id}/edit', 'RoleController@edit')->name('role.edit');
  Route::put('admin/role/{id}/update', 'RoleController@update')->name('role.update');

  Route::delete('admin/role/destroy', 'RoleController@store')->name('role.destroy');




});

});
