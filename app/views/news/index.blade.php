@extends('template.default')
@section('header')
<div class="body1">
	<div class="body2">
		<div class="body5">
			<div class="main zerogrid">
				<!-- header -->
				<header>
					@include('template.menu')
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
					{{$post->title}} - {{$post->user->username}}
				</h5>

				<div class="wrapper pad_bot2">
					{{$post->excerpt}}
					<a class="link1" href="{{URL::action('HomeController@getNews',$post->url)}}">Read More</a>
				</div>
				<div class="clear"></div>
				@endforeach
				{{$posts->links()}}

			</div>

		</article>
	</div>
</div>
@stop
