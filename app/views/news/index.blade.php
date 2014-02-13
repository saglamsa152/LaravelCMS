@extends('template.default')
@section('header')
<div class="body1">
	<div class="body2">
		<div class="body5">
			<div class="main zerogrid">
				<!-- header -->
				<header>
					<div class="wrapper row">
						<h1><a id="logo" href="{{ URL::route('home') }}"><img src="{{ URL::asset('assets/images/logo.png') }}"></a>
						</h1>
						<nav>
							<ul id="menu">
								<li id="nav1"><a href="{{ URL::route('home') }}">Home<span>Welcome!</span></a></li>
								<li id="nav2" class="active"><a href="{{ URL::route('news') }}">News<span>Fresh</span></a></li>
								<li id="nav3"><a href="{{ URL::route('services') }}">Services<span>for you</span></a></li>
								<li id="nav4"><a href="{{ URL::route('products') }}">Products<span>The best</span></a></li>
								<li id="nav5"><a href="{{ URL::route('contacts') }}">Contacts<span>Our Address</span></a></li>
							</ul>
						</nav>
					</div>
				</header>
				<!-- header end-->
			</div>
		</div>
	</div>
</div>
@stop

@section('content')
<div class="body3">
	<div class="main zerogrid">
		<!-- content -->
		<article id="content">
			<div class="wrapper tabs">
				@foreach($posts as $post)
				<h5>
						<span class="dropcap">
							<strong><!-- Gün -->
								@if($post->created_at->day<10)
								0 {{$post->created_at->day}}
								@else
								{{$post->created_at->day}}
								@endif
							<span><!-- Ay -->
								@if($post->created_at->month<10)
								 0 {{$post->created_at->month}}
								@else
									{{$post->created_at->month}}
								@endif
							</span>
							</strong>
						</span>
					{{$post->title}}
				</h5>

				<div class="wrapper pad_bot2">
					{{$post->excerpt}}
					<a class="link1" href="#">Read More</a>
				</div>

				@endforeach
				{{$posts->links()}}

			</div>

		</article>
	</div>
</div>
@stop
