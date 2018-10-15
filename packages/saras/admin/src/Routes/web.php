<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| All Admin related routes.
| prefix /admin
| Admin Routes passes through middleware "admin"
|
*/

Route::group(['prefix'=>'backend', 'middleware'=>'admin'], function(){


/*
|--------------------------------------------------------------------------
| Admin Root Routes
|--------------------------------------------------------------------------
|
| Admin Dashboard
|
*/

Route::get('/', function () {
    return ['fsdhngfmdn'];
});

// Route::get('/', '\admin\Controllers\AdminController@index')->name('admin.root');



});