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
					{{{$post->title}}}
				</h5>

				<div class="wrapper pad_bot2">
					{!!$post->content!!}
				</div>

			</div>

		</article>
	</div>
</div>
@stop
