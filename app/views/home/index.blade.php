@extends('template.default')
@section('header')
<div class="body1">
	<div id="page1" class="body2">
		<div class="main zerogrid">
			<!-- header -->
			<header>
				@include('template.menu')
				@include('template.slider')
			</header>
			<!-- header end-->
		</div>
	</div>
</div>
@stop

@section('content')
<div class="body3">
	<div class="main zerogrid">
		<!-- content -->
		<article id="content">
			<div class="wrapper row">
				<section class="col-3-4">
					<div class="wrap-col">
						<h2 class="under">Hoşgeldiniz!</h2>
						<div class="wrapper">
							<figure class="left marg_right1"><img alt="" src="{{URL::asset('assets/images/page1_img1.jpg')}}">
							</figure>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque porttitor nibh ac laoreet. Maecenas molestie magna ut quam lacinia finibus. In non magna eu ex efficitur accumsan efficitur non massa. Pellentesque eu est a tellus tristique suscipit ac fermentum eros. Suspendisse potenti. Fusce condimentum rutrum nulla, a feugiat dolor imperdiet nec. Aenean purus ligula, bibendum tincidunt placerat id, blandit id turpis. Maecenas varius vulputate ante, et lobortis felis volutpat at. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>

							<p>Nulla nec tincidunt leo. Aliquam arcu libero, ornare sed dignissim nec, dictum a lorem. Vivamus tristique leo efficitur aliquet rhoncus. Aliquam malesuada vulputate leo eu porta. Mauris sodales ornare tristique. Aenean vulputate risus ut ex convallis ornare. Nulla aliquet nisl at lacus dapibus, sit amet posuere purus sagittis. Donec in dolor tellus. Aliquam a consectetur nisl. Donec dapibus eu ipsum ac consectetur. Vivamus quis erat a elit pellentesque sodales. Phasellus laoreet, nisl nec luctus auctor, est risus cursus ligula, et hendrerit tortor ligula non tortor.</p>

						</div>
					</div>
				</section>
				<section class="col-1-4">
					<div class="wrap-col">
						<h2>Duyurular</h2>
						<div class="testimonials">
							<div id="testimonials" style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; height: 210px;">
								<ul style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; height: 1050px; top: -210px;">
									<li style="overflow: hidden; float: none; width: 215px; height: 210px;">
										<div>
											“Nam libero tempore, cum soluta nobis eligendi quo minus quod maxime placeat facere.”
										</div>
									<span><strong class="color1">James Coloway,</strong> <br>
									Director</span>
									</li>
									<li style="overflow: hidden; float: none; width: 215px; height: 210px;">
										<div>
											“Nam libero tempore, cum soluta nobis eligendi quo minus quod maxime placeat facere.”
										</div>
									<span><strong class="color1">James Coloway,</strong> <br>
									Director</span>
									</li>
									<li style="overflow: hidden; float: none; width: 215px; height: 210px;">
										<div>
											“Nam libero tempore, cum soluta nobis eligendi quo minus quod maxime placeat facere.”
										</div>
									<span><strong class="color1">James Coloway,</strong> <br>
									Director</span>
									</li>
									<li style="overflow: hidden; float: none; width: 215px; height: 210px;">
										<div>
											“Nam libero tempore, cum soluta nobis eligendi quo minus quod maxime placeat facere.”
										</div>
									<span><strong class="color1">James Coloway,</strong> <br>
									Director</span>
									</li>
									<li style="overflow: hidden; float: none; width: 215px; height: 210px;">
										<div>
											“Nam libero tempore, cum soluta nobis eligendi quo minus quod maxime placeat facere.”
										</div>
									<span><strong class="color1">James Coloway,</strong> <br>
									Director</span>
									</li>
								</ul>
							</div>
							<a class="up" href="#"></a>
							<a class="down" href="#"></a>
						</div>
					</div>
				</section>
			</div>
		</article>
	</div>
</div>
@stop
