<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<link rel="stylesheet" href="/dashboard_theme/libs/assets/animate.css/animate.css" type="text/css" />
		<link rel="stylesheet" href="/dashboard_theme/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
		<link rel="stylesheet" href="/dashboard_theme/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
		<link rel="stylesheet" href="/dashboard_theme/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
		<link rel="stylesheet" href="/dashboard_theme/css/font.css" type="text/css" />
		<link rel="stylesheet" href="/dashboard_theme/css/app.css" type="text/css" />
	</head>
	<body>
		<div class="app app-header-fixed  ">
			<!-- header -->
			<header id="header" class="app-header navbar" role="menu">
				<!-- navbar header -->
				<div class="navbar-header bg-dark">
					<button class="pull-right visible-xs dk" ui-toggle="show" target=".navbar-collapse">
					<i class="glyphicon glyphicon-cog"></i>
					</button>
					<button class="pull-right visible-xs" ui-toggle="off-screen" target=".app-aside" ui-scroll="app">
					<i class="glyphicon glyphicon-align-justify"></i>
					</button>
					<!-- brand -->
					<a href="#/" class="navbar-brand text-lt">
					<span class="hidden-folded m-l-xs">AnswersVid</span>
					</a>
					<!-- / brand -->
				</div>
				<!-- / navbar header -->
				<!-- navbar collapse -->
				<div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
					<!-- buttons -->
					<div class="nav navbar-nav hidden-xs">
						<a href="#" class="btn no-shadow navbar-btn" ui-toggle="app-aside-folded" target=".app">
							<i class="fa fa-dedent fa-fw text"></i>
							<i class="fa fa-indent fa-fw text-active"></i>
						</a>

					</div>
					<!-- / buttons -->
					<!-- link and dropdown -->
					<ul class="nav navbar-nav hidden-sm">
					</ul>
					<!-- / link and dropdown -->
					<!-- nabar right -->
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							<i class="icon-bell fa-fw"></i>
							<span class="visible-xs-inline">Notifications</span>
							<span class="badge badge-sm up bg-danger pull-right-xs">2</span>
							</a>
							<!-- dropdown -->
							<div class="dropdown-menu w-xl animated fadeInUp">
								<div class="panel bg-white">
									<div class="panel-heading b-light bg-light">
										<strong>You have <span>2</span> notifications</strong>
									</div>
									<div class="list-group">
										<a href class="list-group-item">
										<span class="pull-left m-r thumb-sm">
										<img src="/img/a0.jpg" alt="..." class="img-circle">
										</span>
										<span class="clear block m-b-none">
										Use awesome animate.css<br>
										<small class="text-muted">10 minutes ago</small>
										</span>
										</a>
										<a href class="list-group-item">
										<span class="clear block m-b-none">
										1.0 initial released<br>
										<small class="text-muted">1 hour ago</small>
										</span>
										</a>
									</div>
									<div class="panel-footer text-sm">
										<a href class="pull-right"><i class="fa fa-cog"></i></a>
										<a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
									</div>
								</div>
							</div>
							<!-- / dropdown -->
						</li>
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
							<span class="hidden-sm hidden-md">Rana Faiz Ahmad</span> <b class="caret"></b>
							</a>
							<!-- dropdown -->
							<ul class="dropdown-menu animated fadeInRight w">
								<li class="wrapper b-b m-b-sm bg-light m-t-n-xs">
									<div>
										<p>300mb of 500mb used</p>
									</div>
									<div class="progress progress-xs m-b-none dker">
										<div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
									</div>
								</li>
								<li>
									<a href>
									<span class="badge bg-danger pull-right">30%</span>
									<span>Settings</span>
									</a>
								</li>
								<li>
									<a ui-sref="app.page.profile">Profile</a>
								</li>
								<li>
									<a ui-sref="app.docs">
									<span class="label bg-info pull-right">new</span>
									Help
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="/logout">Logout</a>
								</li>
							</ul>
							<!-- / dropdown -->
						</li>
					</ul>
					<!-- / navbar right -->
				</div>
				<!-- / navbar collapse -->
			</header>
			<!-- / header -->
			<!-- aside -->
			<aside id="aside" class="app-aside hidden-xs bg-dark">
				<div class="aside-wrap">
					<div class="navi-wrap">
						<!-- user -->
						<div class="clearfix hidden-xs text-center hide" id="aside-user">

							<div class="line dk hidden-folded"></div>
						</div>
						<!-- / user -->
						@include('layouts.partials.dashboard.nav')
					</div>
				</div>
			</aside>
			<!-- / aside -->
			<!-- content -->
			<div id="content" class="app-content" role="main">
				<div class="app-content-body ">
					<div class="hbox hbox-auto-xs hbox-auto-sm">
						<!-- main -->
						<div class="col">
							<!-- main header -->
							<div class="bg-light lter b-b wrapper-md">
								<div class="row">
									<div class="col-sm-6 col-xs-12">
										<h1 class="m-n font-thin h3 text-black">@yield('page_title')</h1>
										<small class="text-muted">@yield('page_description')</small>
									</div>
								</div>
							</div>
							<!-- / main header -->
							<div class="wrapper-md">
								@include('layouts.partials.front.flash')
								@yield('content')
							</div>
						</div>
						<!-- / main -->
					</div>
				</div>
			</div>
			<!-- / content -->
			<!-- footer -->
			<footer id="footer" class="app-footer" role="footer">
				<div class="wrapper b-t bg-light">
					<span class="pull-right">2.0.2 <a href ui-scroll="app" class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
					&copy; 2015 Copyright.
				</div>
			</footer>
			<!-- / footer -->
		</div>
		<script src="/dashboard_theme/libs/jquery/jquery/dist/jquery.js"></script>
		<script src="/dashboard_theme/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
		<script src="/dashboard_theme/js/ui-nav.js"></script>
		<script src="/dashboard_theme/js/ui-toggle.js"></script>
		<script src="/editor/js/froala_editor.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
		<script src="/js/all.js"></script>
	</body>
</html>