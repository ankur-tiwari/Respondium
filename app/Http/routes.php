<?php

Route::group(['as' => 'question::'], function () {
	Route::get('/', [
		'uses'	=> 'QuestionsController@index'
	]);

	Route::get('/ask', [
		'uses'	=> 'QuestionsController@create'
	]);

	Route::post('/ask', [
		'uses'	=> 'QuestionsController@store'
	]);

	Route::get('/questions/search/{query}', [
		'uses' => 'QuestionsController@search'
	]);

	Route::get('/questions/{slug}', [
		'uses'	=> 'QuestionsController@show'
	]);
});

Route::group(['as' => 'answer::'], function () {
	Route::post('/answers', [
		'uses'	=> 'AnswersController@store'
	]);

	Route::post('/answers/upload', [
		'uses'	=> 'AnswersController@upload'
	]);
});

Route::group(['as' => 'tag::'], function() {
	Route::get('/tagged/{tag}', [
		'uses' => 'TagsController@show'
	]);
});

Route::group(['as' => 'auth::'], function() {
	Route::get('/signup', [
		'uses' 	=> 'UsersController@create'
	]);

	Route::post('/signup', [
		'uses'	=> 'UsersController@store'
	]);

	Route::get('/profile', [
		'uses'	=> 'UsersController@profile'
	]);

	Route::get('/signin', [
		'uses'	=> 'AuthController@create'
	]);

	Route::post('/signin', [
		'uses'	=> 'AuthController@store'
	]);

	Route::get('/logout', [
		'uses' 	=> 'AuthController@logout'
	]);
});

Route::group(['as' => 'socialauth::'], function() {
	Route::post('/social-login', [
		'uses' => 'AuthController@social'
	]);

	Route::get('/signin/process/google', [
		'uses' => 'AuthController@google'
	]);

	Route::get('/signin/process/facebook', [
		'uses' => 'AuthController@facebook'
	]);

	Route::get('/signin/process/github', [
		'uses' => 'AuthController@github'
	]);

	Route::get('/signin/process/linkedin', [
		'uses' => 'AuthController@linkedin'
	]);
});

Route::group(['as' => 'vote::'], function() {
	Route::post('/votes', [
		'uses'	=> 'VotesController@store'
	]);
});

Route::group(['as' => 'comment::'], function() {
	Route::get('/comments/post/:post', [
		'uses'	=> 'CommentsController@getCommentsForPost'
	]);

	Route::post('/comments', [
		'uses'	=> 'CommentsController@store'
	]);

	Route::post('/comments/answer', [
		'uses'	=> 'CommentsController@storeAnswersComment'
	]);
});

Route::group(['as' => 'contact::'], function() {
	Route::get('/contact-us', [
		'uses' => 'ContactController@form'
	]);

	Route::post('/contact-us', [
		'uses' => 'ContactController@send'
	]);
});

Route::group(['password::'], function() {
	Route::get('password/email', 'Auth\PasswordController@getEmail');
	Route::post('password/email', 'Auth\PasswordController@postEmail');

	Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
	Route::post('password/reset', 'Auth\PasswordController@postReset');
});
