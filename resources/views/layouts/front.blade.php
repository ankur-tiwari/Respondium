<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		@include('layouts.partials.front.title')
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/app.css">
		@yield('header')
	</head>
	<body>

		@include('layouts.partials.front.nav')
		<div class="container">
			@include('layouts.partials.front.flash')
			@include('partials.errors')
			@yield('content')
		</div>

		@include('layouts.partials.front.footer')

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="/js/bundle.js"></script>
		@yield('footer')

		{{-- Google Analytics --}}
		@include('layouts.partials.front.google_analytics')
		{{-- /Google Analytics --}}
	</body>
</html>