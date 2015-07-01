<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Document</title>
		@yield('header')
		<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/css/app.css">
	</head>
	<body>

		@include('partials.nav')
		<div class="container">
			@include('partials.flash')
			@yield('content')
		</div>

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="/editor/js/froala_editor.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
		<script src="/js/all.js"></script>
		@yield('footer')
	</body>
</html>