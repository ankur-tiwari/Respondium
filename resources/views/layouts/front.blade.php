<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Document</title>
		{{-- <link rel="stylesheet" href="http://bootswatch.com/yeti/bootstrap.min.css"> --}}
		<link rel="stylesheet" href="/css/app.css">
	</head>
	<body>

		@include('partials.nav')
		<div class="container">
			@yield('content')
		</div>

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</body>
</html>