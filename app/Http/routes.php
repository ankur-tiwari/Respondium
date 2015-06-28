<?php

Route::get('/home', function() {
	return 'Home';
});

// Users

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

// Questions

Route::get('/', [
	'uses'	=> 'QuestionsController@index',
	'as'	=> 'QuestionsList'
]);

Route::get('/ask', [
	'as'	=> 'ask',
	'uses'	=> 'QuestionsController@create'
]);

Route::post('/ask', [
	'as'	=> 'store_question',
	'uses'	=> 'QuestionsController@store'
]);

Route::get('/questions/{slug}', [
	'as'	=> 'show_question',
	'uses'	=> 'QuestionsController@show'
]);

// Dashboard

Route::get('/dashboard', [
	'as'	=> 'dashboard_home',
	'uses'	=> 'DashboardController@home'
]);
