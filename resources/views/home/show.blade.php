@extends('layouts.front')

@section('content_without_container')
	<div class="container-fluid homepage-hero">
		<h2 class="website-tagline">Get video responses for your web development questions</h2>

		<h3 class="changing-tags loop-tags"><a href="/tagged/html">HTML</a></h3>
		<h3 class="changing-tags loop-tags"><a href="/tagged/css">CSS</a></h3>
		<h3 class="changing-tags loop-tags"><a href="/tagged/javascript">JavaScript</a></h3>
		<h3 class="changing-tags loop-tags"><a href="/tagged/php">PHP</a></h3>
		<h3 class="changing-tags loop-tags"><a href="/tagged/ruby-on-rails">Ruby On Rails</a></h3>

		<a href="/signup" class="btn btn-primary btn-lg call-to-action">Sign Up!</a>
	</div>

@stop

@section('content')
	<div class="row">
		<div class="col-md-9">
			<h3>Latest Questions</h3>
			<ul class="list-group" id="questions-list">
				@foreach($questions as $question)
					@include('questions.partials.list')
				@endforeach
			</ul>
		</div>
		<div class="col-md-3 sidebar-tags">
			@include('layouts.partials.sidebar.tags')
		</div>
	</div>

@stop