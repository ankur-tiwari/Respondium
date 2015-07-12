<?php

// Answers

Route::post('/answers', [
	'uses'	=> 'AnswersController@store'
]);

// Questions

Route::get('/', [
	'uses'	=> 'QuestionsController@index'
]);

Route::get('/ask', [
	'uses'	=> 'QuestionsController@create'
]);

Route::post('/ask', [
	'uses'	=> 'QuestionsController@store'
]);

Route::get('/questions/{slug}', [
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

// Social Login

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

Route::post('/comments/answer', [
	'uses'	=> 'CommentsController@storeAnswersComment'
]);

// Dashboard

Route::get('/dashboard', [
	'uses'	=> 'DashboardController@home'
]);
