<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			@if ( ! Request::is('/'))
				<a href="/" class="navbar-brand">AnswersVid</a>
			@endif
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				{!! nav_item('Home', '/', $page) !!}
				{!! nav_item('Ask', '/ask', $page) !!}
				{!! nav_item('Contact Us', '/contact-us', $page) !!}
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if (!Auth::check())
					{!! nav_item('Sign in', '/signin', $page) !!}
					{!! nav_item('Sign up', '/signup', $page) !!}
				@endif
				@if(Auth::check())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a id="logout_link" href="/logout">Logout</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>