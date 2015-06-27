<?php

Route::get('/home', function() {
	return 'Home';
});

Route::get('/', [
	'uses'	=> 'QuestionsController@index',
	'as'	=> 'QuestionsList'
]);

Route::get('/signup', [
	'as'	=> 'signup',
	'uses' 	=> 'UsersController@create'
]);

Route::post('/signup', [
	'as'	=> 'signup_post',
	'uses'	=> 'UsersController@store'
]);

Route::get('/signin', [
	'as' 	=> 'login',
	'uses'	=> 'AuthController@create'
]);

Route::post('/signin', [
	'as' 	=> 'post_signin',
	'uses'	=> 'AuthController@store'
]);

Route::get('/logout', [
	'as' 	=> 'logout',
	'uses' 	=> 'AuthController@logout'
]);


// Dashboard

Route::get('/dashboard', [
	'as'	=> 'dashboard_home',
	'uses'	=> 'DashboardController@home'
]);
