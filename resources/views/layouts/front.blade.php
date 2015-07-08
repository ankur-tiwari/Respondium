<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Document</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
		<link href="/editor/css/froala_editor.min.css" rel="stylesheet" type="text/css" />
		<link href="/editor/css/froala_style.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="/css/app.css">
		@yield('header')
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
		<script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
		<script src="/js/all.js"></script>
		@yield('footer')
	</body>
</html>