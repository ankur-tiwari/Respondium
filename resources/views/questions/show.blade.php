@extends('layouts.front')

@section('content')

	<div class="row">
		<div class="col-md-9">

			<div class="row">
				<div class="col-md-12">
					<h2>{{ $question->title }}</h2>
					<hr>
					<div>{!! $question->description !!}</div>
					<div>
						<a class="label label-primary">pronunciation</a>
						<a class="label label-primary">name</a>
						<a class="label label-primary">personal</a>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3 col-md-offset-9 padding-15">
					<div class="well">
						Asked <time class="timeago" datetime="{{ $question->created_at->format('c') }}"></time> <br>
						{{ $question->user->name }}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<form id="comment_form" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="post_id" value="{{ $question->id }}">
						<div class="form-group">
							<textarea placeholder="Write a comment" name="body" id="comment_body" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>

			<div class="row" id="comments">
				@foreach($comments as $comment)
				<div class="comment-item">
					<div class="body">
						{{ $comment->body }} - {{ $comment->user->name }} <time class="timeago" datetime="{{ $comment->created_at }}"></time>
					</div>
				</div>
				@endforeach
			</div>

		</div>
		<div class="col-md-3"></div>
	</div>

	<template id="comment_template" type="text/html">
		<div class="comment-item">
			<div class="body">@{{body}} - @{{user.name}} <time class="created-at-timeago" datetime="@{{created_at}}"></time></div>
		</div>
	</template>

@stop