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
						@foreach($question->tags as $tag)
							<a href="/tagged/{{ $tag->name }}" class="label label-primary">{{ $tag->name }}</a>
						@endforeach
					</div>
					<hr>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<form id="upvote_form" class="inline">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="post_id" value="{{ $question->id }}">
						<input type="hidden" name="type" value="upvote">
						<button class="btn btn-xs btn-success">Upvote</button>
					</form>
					<form id="downvote_form" class="inline">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="post_id" value="{{ $question->id }}">
						<input type="hidden" name="type" value="downvote">
						<button class="btn btn-xs btn-default">Downvote</button>
					</form>
				</div>
				<div class="col-md-6">
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
				@foreach($question->comments as $comment)
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