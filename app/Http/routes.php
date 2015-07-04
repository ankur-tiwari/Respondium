<?php

Route::get('/test', function() {
	$generator = new \App\Random\Iframes\Generator();

	$website = 'Dailymotion';

	$url = 'http://www.dailymotion.com/video/x16thp0_angry-nerd-the-implausibility-of-thor-s-physics-defying-hammer-mjolnir_tech';

	return view('test', compact('generator'));
});

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

// Tags

Route::get('/tagged/{tag}', [
	'uses' => 'TagsController@show'
]);

// Users

Route::get('/raw/user/{userId}', [
	'uses'	=> 'UsersController@rawShow'
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

// Votes

Route::post('/votes', [
	'uses'	=> 'VotesController@store'
]);

// Comments

Route::get('/comments/post/:post', [
	'uses'	=> 'CommentsController@getCommentsForPost'
]);

Route::post('/comments', [
	'uses'	=> 'CommentsController@store'
]);

// Dashboard

Route::get('/dashboard', [
	'as'	=> 'dashboard_home',
	'uses'	=> 'DashboardController@home'
]);
