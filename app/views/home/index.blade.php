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
				<section class="col-1-4">
					<div class="wrap-col">
						<h3><span class="dropcap"><cufon class="cufon cufon-canvas" alt="A" style="width: 21px; height: 38px;"><canvas width="41" height="46" style="width: 41px; height: 46px; top: -8px; left: -1px;"></canvas><cufontext>A</cufontext></cufon></span><cufon class="cufon cufon-canvas" alt="Business" style="width: 92px; height: 26px;"><canvas width="110" height="32" style="width: 110px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Business</cufontext></cufon><span><cufon class="cufon cufon-canvas" alt="planning" style="width: 86px; height: 26px;"><canvas width="102" height="32" style="width: 102px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>planning</cufontext></cufon></span></h3>
						<p class="pad_bot1">Progress is one of <a target="_blank" href="http://blog.templatemonster.com/free-website-templates/">free website templates</a> created by TemplateMonster.com, optimized for 1024x768 res.</p>
						<a class="link1" href="#">Read More</a>
					</div>
				</section>
				<section class="col-1-4">
					<div class="wrap-col">
						<h3><span class="dropcap"><cufon class="cufon cufon-canvas" alt="B" style="width: 21px; height: 38px;"><canvas width="41" height="46" style="width: 41px; height: 46px; top: -8px; left: -1px;"></canvas><cufontext>B</cufontext></cufon></span><cufon class="cufon cufon-canvas" alt="Business" style="width: 92px; height: 26px;"><canvas width="110" height="32" style="width: 110px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Business</cufontext></cufon><span><cufon class="cufon cufon-canvas" alt="strategies" style="width: 98px; height: 26px;"><canvas width="115" height="32" style="width: 115px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>strategies</cufontext></cufon></span></h3>
						<p class="pad_bot1">This <a href="http://blog.templatemonster.com/2011/07/11/free-website-template-slider-typography/">Progress Template</a> goes with two packages &ndash; with PSD source files and without them.</p>
						<a class="link1" href="#">Read More</a>
					</div>
				</section>
				<section class="col-1-4">
					<div class="wrap-col">
						<h3><span class="dropcap"><cufon class="cufon cufon-canvas" alt="C" style="width: 21px; height: 38px;"><canvas width="41" height="46" style="width: 41px; height: 46px; top: -8px; left: -1px;"></canvas><cufontext>C</cufontext></cufon></span><cufon class="cufon cufon-canvas" alt="Powerful" style="width: 90px; height: 26px;"><canvas width="114" height="32" style="width: 114px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Powerful</cufontext></cufon><span><cufon class="cufon cufon-canvas" alt="analytics" style="width: 89px; height: 26px;"><canvas width="107" height="32" style="width: 107px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>analytics</cufontext></cufon></span></h3>
						<p class="pad_bot1">PSD source files are available for free for registered members. The basic package is available for anyone.</p>
						<a class="link1" href="#">Read More</a>
					</div>
				</section>
				<section class="col-1-4">
					<div class="wrap-col">
						<h3><span class="dropcap"><cufon class="cufon cufon-canvas" alt="D" style="width: 23px; height: 38px;"><canvas width="41" height="46" style="width: 41px; height: 46px; top: -8px; left: -1px;"></canvas><cufontext>D</cufontext></cufon></span><cufon class="cufon cufon-canvas" alt="Worldwide" style="width: 107px; height: 26px;"><canvas width="124" height="32" style="width: 124px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Worldwide</cufontext></cufon><span><cufon class="cufon cufon-canvas" alt="solutions" style="width: 92px; height: 26px;"><canvas width="109" height="32" style="width: 109px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>solutions</cufontext></cufon></span></h3>
						<p class="pad_bot1">This website template has several pages: Home, News, Services, Products, Contacts (contact form doesn’t work).</p>
						<a class="link1" href="#">Read More</a>
					</div>
				</section>
			</div>
			<div class="wrapper row">
				<section class="col-3-4">
					<div class="wrap-col">
						<h2 class="under"><cufon class="cufon cufon-canvas" alt="Welcome, " style="width: 152px; height: 40px;"><canvas width="188" height="48" style="width: 188px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>Welcome, </cufontext></cufon><cufon class="cufon cufon-canvas" alt="dear " style="width: 71px; height: 40px;"><canvas width="107" height="48" style="width: 107px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>dear </cufontext></cufon><cufon class="cufon cufon-canvas" alt="visitor!" style="width: 94px; height: 40px;"><canvas width="129" height="48" style="width: 129px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>visitor!</cufontext></cufon></h2>
						<div class="wrapper">
							<figure class="left marg_right1"><img alt="" src="{{URL::asset('assets/images/page1_img1.jpg')}}"></figure>
							<p class="pad_bot1">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa.</p>
							<p>
								Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
						</div>
					</div>
				</section>
				<section class="col-1-4">
					<div class="wrap-col">
						<h2><cufon class="cufon cufon-canvas" alt="Testimonials" style="width: 176px; height: 40px;"><canvas width="204" height="48" style="width: 204px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>Testimonials</cufontext></cufon></h2>
						<div class="testimonials">
							<div id="testimonials" style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; height: 210px;">
								<ul style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; height: 1050px; top: -210px;"><li style="overflow: hidden; float: none; width: 215px; height: 210px;">
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
									</li></ul>
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
