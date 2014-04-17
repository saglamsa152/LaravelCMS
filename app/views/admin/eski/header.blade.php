<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	@if(isset($title))
	<title>{{$title}}</title>
	@else
	<title>Free HTML5 Bootstrap Admin Template</title>
	@endif
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">
	<!-- The styles -->
	{{ HTML::style('assets/admin/css/bootstrap-cerulean.css',array('id'=>'bs-css')) }}
	<style type="text/css">
		body {
			padding-bottom: 40px;
		}

		.sidebar-nav {
			padding: 9px 0;
		}
	</style>
	<!--//todo #5 bunların  bu kadar çok olması  hoş değil  bunlara bir  ayar çekmek lazım-->
	{{ HTML::style('assets/admin/css/bootstrap-responsive.css') }}
	{{ HTML::style('assets/admin/css/charisma-app.css') }}
	{{ HTML::style('assets/admin/css/jquery-ui-1.8.21.custom.css') }}
	{{ HTML::style('assets/admin/css/fullcalendar.css') }}
	{{ HTML::style('assets/admin/css/fullcalendar.print.css') }}
	{{ HTML::style('assets/admin/css/chosen.css') }}
	{{ HTML::style('assets/admin/css/uniform.default.css') }}
	{{ HTML::style('assets/admin/css/colorbox.css') }}
	{{ HTML::style('assets/admin/css/jquery.cleditor.css') }}
	{{ HTML::style('assets/admin/css/jquery.noty.css') }}
	{{ HTML::style('assets/admin/css/noty_theme_default.css') }}
	{{ HTML::style('assets/admin/css/elfinder.min.css') }}
	{{ HTML::style('assets/admin/css/elfinder.theme.css') }}
	{{ HTML::style('assets/admin/css/jquery.iphone.toggle.css') }}
	{{ HTML::style('assets/admin/css/opa-icons.css') }}
	{{ HTML::style('assets/admin/css/uploadify.css') }}
	{{ HTML::style('assets/admin/css/custom.css') }}
	<!--Mini ajax file upload -->
	{{ HTML::style('assets/admin/css/mini-ajax-upload-style.css')}}
	{{ HTML::style('http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700')}}
	<!--/Mini Ajax file upload-->

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	{{ HTML::script('http://html5shim.googlecode.com/svn/trunk/html5.js') }}
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="{{ URL::asset('assets/admin/img/favicon.ico') }}">

</head>

<body>
@if(Auth::check())
<!-- topbar starts -->
<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="{{ URL::action('AdminController@getIndex') }}">
				<img alt="Charisma Logo" src="{{URL::asset('assets/admin/img/logo20.png') }}" /> <span>Charisma</span>
			</a>

			<!-- theme selector starts -->
			<div class="btn-group pull-right theme-container">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="icon-tint"></i><span class="hidden-phone"> <?php echo _('Change Theme / Skin')?></span>
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" id="themes">
					<li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
					<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
					<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
					<li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
					<li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
					<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
					<li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
					<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
					<li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
				</ul>
			</div>
			<!-- theme selector ends -->

			<!-- user dropdown starts -->
			<div class="btn-group pull-right">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="icon-user"></i><span class="hidden-phone"> {{Auth::user()->username}}</span>
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="{{URL::action('AdminController@getProfile',Auth::user()->id)}}"> <?php echo _('Profile')?></a></li>
					<li class="divider"></li>
					<li>{{link_to_action('AdminController@getLogout',_('Logout'))}}</li>
				</ul>
			</div>
			<!-- user dropdown ends -->

			<div class="top-nav nav-collapse">
				<ul class="nav">
					<li><a href="{{ URL::route('home') }}"><?php echo _('Visit Site')?></a></li>
					<li>
						<form class="navbar-search pull-left">
							<input placeholder="<?php echo _('Search')?>" class="search-query span2" name="query" type="text">
						</form>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
</div>
<!-- topbar ends -->
@endif
<div class="container-fluid">
	<div class="row-fluid">
		@if(Auth::check())

		<!-- left menu starts -->
		<div class="span2 main-menu-span">
			<div class="well nav-collapse sidebar-nav">
				<ul class="nav nav-tabs nav-stacked main-menu">
					<li class="nav-header hidden-tablet"><?php echo _('Main')?></li>
					<li>
						<a class="ajax-link" href="{{URL::action('AdminController@getIndex')}}"><i class="icon-home"></i><span class="hidden-tablet"> <?php echo _('Dashboard')?></span></a>
					</li>
					<li>
						<a class="ajax-link" href="{{URL::action('AdminController@getUsers')}}"><i class="icon-user"></i><span class="hidden-tablet"> <?php echo _('Users')?></span></a>
					</li>
					<li>
						<a class="ajax-link" href="{{URL::action('AdminController@getNews')}}"><i class=" icon-list-alt"></i><span class="hidden-tablet"> <?php echo _('News')?></span></a>
					</li>
					<li>
						<a class="ajax-link" href="{{URL::action('AdminController@getProducts')}}"><i class=" icon-list-alt"></i><span class="hidden-tablet"> <?php echo _('Products')?></span></a>
					</li>
					<li>
						<a class="ajax-link" href="{{URL::action('AdminController@getServices')}}"><i class=" icon-briefcase"></i><span class="hidden-tablet"> <?php echo _('Services')?></span></a>
					</li>
					<li>
						<a class="ajax-link" href="{{URL::action('AdminController@getOrders')}}"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> <?php echo _('Orders')?></span></a>
					</li>
					<li>
						<a class="ajax-link" href="{{URL::action('AdminController@getSlider')}}"><i class="icon-picture"></i><span class="hidden-tablet"> <?php echo _('Slider')?></span></a>
					</li>
					<li>
						<a class="ajax-link" href="{{URL::action('AdminController@getContacts')}}"><i class=" icon-envelope"></i><span class="hidden-tablet"> <?php echo _('Contact')?></span></a>
					</li>
					<li>
						<a class="ajax-link" href="{{URL::action('AdminController@getOptions')}}"><i class=" icon-wrench"></i><span class="hidden-tablet"> <?php echo _('Options')?></span></a>
					</li>
				</ul>
				<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> <?php echo _('Ajax on menu')?></label>
			</div>
			<!--/.well -->
		</div>
		<!--/span-->
		<!-- left menu ends -->

		<noscript>
			<div class="alert alert-block span10">
				<h4 class="alert-heading"><?php echo _('Warning!')?></h4>

				<p><?php echo _('You need to have
					<a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.')?></p>
			</div>
		</noscript>

		<div id="content" class="span10">
			<!-- content starts -->
			@endif
