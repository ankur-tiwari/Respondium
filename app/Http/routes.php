<?php

Route::get('/home', 'HomeController@show');

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

	Route::get('/questions/{slug}/edit', [
		'uses' => 'QuestionsController@edit'
	]);

	Route::put('/questions/{slug}', [
		'uses' => 'QuestionsController@update'
	]);

	Route::delete('/questions/{slug}', [
		'uses' => 'QuestionsController@destroy'
	]);
});

Route::group(['as' => 'answer::'], function () {
	Route::post('/answers', [
		'uses'	=> 'AnswersController@store'
	]);

	Route::post('/questions/{id}/answers', [
		'uses'	=> 'AnswersController@store'
	]);

	Route::post('/answers/upload', [
		'uses'	=> 'AnswersController@upload'
	]);

	Route::get('/answers/{id}/comments', [
		'uses' => 'AnswersController@listComments'
	]);

	Route::post('/answers/{id}/comments', [
		'uses' => 'AnswersController@storeComments'
	]);

	Route::delete('/answers/{id}', [
		'uses' => 'AnswersController@destroy'
	]);
});

Route::group(['as' => 'tag::'], function () {
	Route::get('/tags', [
		'uses' => 'TagsController@index'
	]);

	Route::get('/tagged/{tag}', [
		'uses' => 'TagsController@show'
	]);

	Route::get('/tags/create', [
		'uses' => 'TagsController@create'
	]);

	Route::post('/tags', [
		'uses' => 'TagsController@store'
	]);
});

Route::group(['as' => 'auth::'], function () {
	Route::get('/signup', [
		'uses' 	=> 'UsersController@create'
	]);

	Route::post('/signup', [
		'uses'	=> 'UsersController@store'
	]);

	Route::get('/auth/show', [
		'uses' => 'AuthController@show'
	]);

	Route::get('/signin', [
		'uses'	=> 'AuthController@create'
	]);

	Route::post('/signin', [
		'uses'	=> 'AuthController@store'
	]);

	Route::get('/email/confirm/{code}', [
		'uses' => 'AuthController@confirm'
	]);

	Route::get('/logout', [
		'uses' 	=> 'AuthController@logout'
	]);
});

Route::group(['as' => 'user::'], function () {
	Route::get('/user/{id}/profile', [
		'uses' => 'UserProfileController@show'
	]);

	Route::get('/profile/edit', [
		'uses' => 'UserProfileController@edit'
	]);

	Route::post('/user/{id}/profile', [
		'uses' => 'UserProfileController@store'
	]);
});

Route::group(['as' => 'socialauth::'], function () {
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

Route::group(['as' => 'vote::'], function () {
	Route::get('/questions/{id}/upvotes', [
		'uses' => 'VotesController@upvotes'
	]);

	Route::get('/questions/{id}/downvotes', [
		'uses' => 'VotesController@downvotes'
	]);

	Route::post('/questions/{id}/votes', [
		'uses'	=> 'VotesController@store'
	]);

	Route::get('/questions/{id}/voted', [
		'uses' => 'VotesController@voted'
	]);
});

Route::group(['as' => 'comment::'], function () {
	Route::get('/questions/{id}/comments', [
		'uses' => 'CommentsController@index'
	]);

	Route::post('/questions/{id}/comments', [
		'uses' => 'CommentsController@store'
	]);
});

Route::group(['as' => 'contact::'], function () {
	Route::get('/contact-us', [
		'uses' => 'ContactController@form'
	]);

	Route::post('/contact-us', [
		'uses' => 'ContactController@send'
	]);
});

Route::group(['password::'], function () {
	Route::get('password/email', 'Auth\PasswordController@getEmail');
	Route::post('password/email', 'Auth\PasswordController@postEmail');

	Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
	Route::post('password/reset', 'Auth\PasswordController@postReset');
});
