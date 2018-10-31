<?php

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/home', 'ClientController@index')->name('home');

Route::get('/', ['as' => 'home', 'uses' => 'ClientController@index']);

Route::get('myproduct/{id}', ['as' => 'myproduct', 'uses' => 'ClientController@myproduct']);

Route::get('size/{data}', ['as' => 'size', 'uses' => 'ClientController@size']);

Route::get('cost/{data}', ['as' => 'cost', 'uses' => 'ClientController@cost']);

Route::get('color/{data}', ['as' => 'color', 'uses' => 'ClientController@color']);

Route::post('submit', ['as' => 'submit', 'uses' => 'ClientController@submit']);

Route::get('cart', ['as' => 'cart', 'uses' => 'ClientController@cart']);

Route::get('contact', ['as' => 'contact', 'uses' => 'ClientController@contact']);

Route::get('mission', ['as' => 'mission', 'uses' => 'ClientController@mission']);

Route::get('brand', ['as' => 'brand', 'uses' => 'ClientController@brand']);

Route::get('policy', ['as' => 'policy', 'uses' => 'ClientController@policy']);

Route::get('add_to_cart/{id}', ['as' => 'add_to_cart', 'uses' => 'ClientController@getAddToCart']);

Route::get('moveon', ['as' => 'check_out', 'uses' => 'ClientController@moveon']);

Route::post('buy_items', ['as' => 'buy_items', 'uses' => 'ClientController@store']);



/*
|--------------------------------------------------------------------------
| Facebook Sociallite
|--------------------------------------------------------------------------
|
*/

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('fb_login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

/*
|--------------------------------------------------------------------------
| Google Sociallite
|--------------------------------------------------------------------------
|
*/

Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle')->name('google_login');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');




/*
|--------------------------------------------------------------------------
| Stores Routes
|--------------------------------------------------------------------------
|
| All Stores related routes.
| prefix /backend
| Stores Routes passes through middleware "admin"
|
*/

Route::group(['prefix'=>'backend', 'middleware'=>'admin'], function(){


/*
|--------------------------------------------------------------------------
| Stores Root Routes
|--------------------------------------------------------------------------
|
| Stores Dashboard
|
*/

Route::get('/', 'AdminController@index')->name('admin.root');



/*
|--------------------------------------------------------------------------
| Items in the Stores
|--------------------------------------------------------------------------
|
| List the Items and add new Items
|
*/

Route::get('/items/list', 'AdminController@liststores')->name('store.list.items');

Route::get('items/deleted', 'AdminController@deleted')->name('store.deleted.items');

Route::get('/items/new', 'AdminController@newstores')->name('store.new.items');

Route::post('/items/save', 'AdminController@saveitems')->name('store.save.items');

Route::post('items/update', 'AdminController@updateitems')->name('store.update.items');

Route::get('/items/edit/{id}', 'AdminController@edititems')->name('store.edit.items');

Route::get('items/delete/{id}', 'AdminController@deleteitems')->name('store.items.delete.confirm');

Route::get('items/stock/{id}', 'AdminController@stock')->name('store.stock.items');

Route::post('items/onstock', 'AdminController@onstock')->name('store.onstock.items');

Route::post('items/outofstock', 'AdminController@outofstock')->name('store.outofstock.items');

Route::post('items/group_delete', 'AdminController@group_delete')->name('store.group_delete.items');


});

Route::group(['prefix'=>'backend', 'middleware'=>'web'], function(){

/*
|--------------------------------------------------------------------------
| Stores Login Routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin_login');

Route::post('login', 'Admin\LoginController@login')->name('admin.login');

Route::post('register', 'Admin\LoginController@register')->name('admin.register');

Route::any('logout', 'Admin\LoginController@logout')->name('admin.logout');



/*
|--------------------------------------------------------------------------
| Forget Reset
|--------------------------------------------------------------------------
|
|
*/
Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');



/*
|--------------------------------------------------------------------------
| Stores Forget Password
|--------------------------------------------------------------------------
|
|
*/

Route::get('store/passwordreset', 'Admin\PasswordController@showLinkRequestForm')->name('admin.passwords.forget');

Route::post('store/password/email', 'Admin\PasswordController@sendResetLinkEmail')->name('admin.passwords.email');

Route::POST('password/reset','Admin\ResetPasswordController@reset')->name('admin.passwords.request');



/*
|--------------------------------------------------------------------------
| Stores Verifying Routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('verify/{email}/{verifyToken}','Admin\LoginController@emailsentstores')->name('emailsentstores');




});

/*
|--------------------------------------------------------------------------
| Owner Routes
|--------------------------------------------------------------------------
|
| All Owner related routes.
| prefix /owner
| Owner Routes passes through middleware "owner"
|
*/

Route::group(['prefix'=>'owner', 'middleware'=>'owner'], function(){


/*
|--------------------------------------------------------------------------
| Owner Root Routes
|--------------------------------------------------------------------------
|
| Owner Dashboard
|
*/

Route::get('/', 'OwnerController@index')->name('owner.root');


/*
|--------------------------------------------------------------------------
| Registering Stores
|--------------------------------------------------------------------------
|
| List the Stores and add new Stores
|
*/

Route::get('/stores/list', 'OwnerController@liststores')->name('owner.list.stores');

Route::get('stores/registered', 'OwnerController@registered')->name('owner.registered.stores');

Route::get('stores/deleted', 'OwnerController@deleted')->name('owner.deleted.stores');

Route::get('/stores/new', 'OwnerController@newstores')->name('owner.new.stores');

Route::post('/stores/save', 'OwnerController@savestores')->name('owner.save.stores');

Route::post('stores/update', 'OwnerController@updatestores')->name('owner.update.stores');

Route::get('/stores/edit/{id}', 'OwnerController@editstores')->name('owner.edit.stores');

Route::get('stores/delete/{id}', 'OwnerController@deletestores')->name('owner.store.delete.confirm');

Route::get('stores/profession/{id}', 'OwnerController@profession')->name('owner.profession.stores');

Route::post('stores/activate', 'OwnerController@activate')->name('owner.activate.stores');

Route::post('stores/deactivate', 'OwnerController@deactivate')->name('owner.deactivate.stores');

Route::post('stores/group_delete', 'OwnerController@group_delete')->name('owner.group_delete.stores');





/*
|--------------------------------------------------------------------------
| Registering Owners
|--------------------------------------------------------------------------
|
| List the Owners and add new Owners
|
*/

Route::get('/owners/list', 'OwnerController@listowner')->name('owner.list.owners');

Route::get('owners/registered', 'OwnerController@owner_registered')->name('owner.registered.owners');

Route::get('owners/deleted', 'OwnerController@owner_deleted')->name('owner.deleted.owners');
	
Route::get('/owners/new', 'OwnerController@newowner')->name('owner.new.owners');

Route::post('/owners/save', 'OwnerController@saveowner')->name('owner.save.owners');

Route::post('/owners/update', 'OwnerController@updateowner')->name('owner.update.owners');

Route::get('/owners/edit/{id}', 'OwnerController@editowner')->name('owner.edit.owners');

Route::get('owners/delete/{id}', 'OwnerController@deleteowner')->name('owner.owners.delete.confirm');

Route::get('owners/profession/{id}', 'OwnerController@owner_profession')->name('owner.profession.owners');

Route::post('owners/activate', 'OwnerController@owner_activate')->name('owner.activate.owners');

Route::post('owners/deactivate', 'OwnerController@owner_deactivate')->name('owner.deactivate.owners');

Route::post('owners/group_delete', 'OwnerController@owner_group_delete')->name('owner.group_delete.owners');



});

Route::group(['prefix'=>'owner', 'middleware'=>'web'], function(){

/*
|--------------------------------------------------------------------------
| Owner Login Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('login', 'Owner\LoginController@showLoginForm')->name('owner_login');

Route::post('login', 'Owner\LoginController@login')->name('owner.login');

Route::post('register', 'Owner\LoginController@register')->name('owner.register');

Route::any('logout', 'Owner\LoginController@logout')->name('owner.logout');


/*
|--------------------------------------------------------------------------
| Owners Forget Password
|--------------------------------------------------------------------------
|
|
*/ 

Route::get('owner/passwordreset', 'Owner\PasswordController@showLinkRequestForm')->name('owner.passwords.forget');

Route::post('owner/password/email', 'Owner\PasswordController@sendResetLinkEmail')->name('owner.passwords.email');

Route::POST('owner/reset','Owner\ResetPasswordController@reset')->name('owner.passwords.request');


/*
|--------------------------------------------------------------------------
| Forget Reset
|--------------------------------------------------------------------------
|
|
*/
Route::get('password/reset/{token}', 'Owner\ResetPasswordController@showResetForm')->name('owner.password.reset');



/*
|--------------------------------------------------------------------------
| Owner Verifying Routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('verify/{email}/{verifyToken}','Owner\LoginController@emailSentOwner')->name('emailSentOwner');


});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
