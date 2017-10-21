<?php


Route::group(['middleware' => ['web']], function () {
	Auth::routes();
});

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('/', 'TimeLineController@index')->name('home');

	Route::get('/posts', 'PostController@index');
	Route::post('/posts', 'PostController@create');

	Route::get('/users/{user}', 'UserController@index')->name('user.index');
	Route::get('/users/{user}/follow', 'UserController@follow')->name('user.follow');
	Route::get('/users/{user}/unfollow', 'UserController@unfollow')->name('user.unfollow');
});