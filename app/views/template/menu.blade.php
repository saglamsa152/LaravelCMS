<div class="wrapper row">
	<h1><a id="logo" href="{{ URL::route('home') }}"><img src="{{ URL::asset('assets/images/logo.png') }}"></a>
	</h1>
	<nav>
		<ul id="menu">
			<li id="nav1"
			@if(str_contains(URL::current(),'')) class="active" @endif><a href="{{ URL::route('home') }}">Home<span>Welcome!</span></a></li>
			<li id="nav2"
			@if(str_contains(URL::current(),'/news')) class="active" @endif><a href="{{URL::action('HomeController@getNews')}}">News<span>Fresh</span></a></li>
			<li id="nav3"
			@if(str_contains(URL::current(),'/services')) class="active" @endif><a href="{{URL::action('HomeController@getServices')}}">Services<span>for you</span></a></li>
			<li id="nav4"
			@if(str_contains(URL::current(),'/products')) class="active" @endif><a href="{{URL::action('HomeController@getProducts')}}">Products<span>The best</span></a></li>
			<li id="nav5"
			@if(str_contains(URL::current(),'/contacts')) class="active" @endif><a href="{{URL::action('HomeController@getContacts')}}">Contacts<span>Our Address</span></a></li>
		</ul>
	</nav>
</div>