<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">AnswersVid</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="#">Questions</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if (!Auth::check())
					<li><a href="/signin">Signin</a></li>
					<li><a href="/signup">Signup</a></li>
				@endif
				@if(Auth::check())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/logout">Logout</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>