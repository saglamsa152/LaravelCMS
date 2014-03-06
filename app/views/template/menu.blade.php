<div class="wrapper row">
	<h1><a id="logo" href="{{ URL::route('home') }}"><img src="{{ URL::asset('assets/images/logo.png') }}"></a>
	</h1>
	<nav>
		<ul id="menu">
			<li id="nav1"
			@if(str_contains(URL::current(),'')) class="active" @endif><a href="{{ URL::route('home') }}"><?php echo _('Home')?><span><?php echo _('Welcome!')?></span></a></li>
			<li id="nav2"
			@if(str_contains(URL::current(),'/news')) class="active" @endif><a href="{{URL::action('HomeController@getNews')}}"><?php echo _('News')?><span><?php echo _('Fresh')?></span></a></li>
			<li id="nav3"
			@if(str_contains(URL::current(),'/services')) class="active" @endif><a href="{{URL::action('HomeController@getServices')}}"><?php echo _('Services')?><span><?php echo _('for you')?></span></a></li>
			<li id="nav4"
			@if(str_contains(URL::current(),'/products')) class="active" @endif><a href="{{URL::action('HomeController@getProducts')}}"><?php echo _('Products')?><span><?php echo _('The best')?></span></a></li>
			<li id="nav5"
			@if(str_contains(URL::current(),'/contacts')) class="active" @endif><a href="{{URL::action('HomeController@getContacts')}}"><?php echo _('Contacts')?><span><?php echo _('Our Address')?></span></a></li>
		</ul>
	</nav>
</div>