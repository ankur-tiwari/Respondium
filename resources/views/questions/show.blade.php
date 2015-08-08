@extends('layouts.front')

@section('content')

	<div class="row">
		<div class="col-md-9">
			@include('questions.partials.single')
			@include('questions.partials.comments')

			@include('questions.forms.answer')
			<div id="answerslist">
				@include('questions.partials.answerslist')
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>

	<template id="comment_template">
		<div class="col-md-12 comment-item">
			<div class="body">@{{body}} - @{{user.name}} <time class="created-at-timeago" datetime="@{{created_at}}"></time></div>
		</div>
	</template>

@stop