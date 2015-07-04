<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<br>
					{!! $generator->generate('vimeo', 'https://vimeo.com/126618429')->iframeCodeForBootstrap() !!}
					<hr>
					{!! $generator->generate('vimeo', 'https://vimeo.com/126618429')->iframeCodeForBootstrap() !!}
					<br>
				</div>
			</div>
		</div>
	</body>
</html>