<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/authtest', array('before' => 'auth.basic', function()
{
    return View::make('hello');
}));

Route::get('/', function()
{
	return View::make('hello');
});

// Route group for API versioning
Route::group(array('prefix' => 'api/v1', 'before' => 'auth.basic'), function()
{
    Route::resource('url', 'UrlController');
});

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('post', 'PostController');
});

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('post_visibility', 'Post_visibilityController');
});

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('source_auth', 'Source_authController');
});

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('source', 'SourceController');
});

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('user', 'UserController');
});


