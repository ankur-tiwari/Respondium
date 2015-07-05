@extends('layouts.front')

@section('content')

	<div class="row">
		<div class="col-md-9">
			@include('questions.partials.single')
			<div class="row">
				<div class="col-md-6">
					@include('questions.forms.upvote')
					@include('questions.forms.downvote')
				</div>
				<div class="col-md-6">
					<div class="well">
						Asked <time class="timeago" datetime="{{ $question->created_at->format('c') }}"></time> <br>
						{{ $question->user->name }}
					</div>
				</div>
			</div>
			@include('questions.forms.comment')
			@include('questions.partials.commentslist')
			@include('questions.partials.answerslist')
			@include('questions.forms.answer')
		</div>
		<div class="col-md-3"></div>
	</div>

	<template id="comment_template">
		<div class="comment-item">
			<div class="body">@{{body}} - @{{user.name}} <time class="created-at-timeago" datetime="@{{created_at}}"></time></div>
		</div>
	</template>

@stop