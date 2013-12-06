@extends('template.default')
@section('header')
<div class="body1">
	<div class="body2">
		<div class="body5">
			<div class="main zerogrid">
				<!-- header -->
				<header>
					<div class="wrapper row">
						<h1><a id="logo" href="{{ URL::route('home') }}"><img src="{{ URL::asset('assets/assets/images/logo.png') }}"></a></h1>
						<nav>
							<ul id="menu">
								<li id="nav1"><a href="{{ URL::route('home') }}">Home<span>Welcome!</span></a></li>
								<li id="nav2"><a href="{{ URL::route('news') }}">News<span>Fresh</span></a></li>
								<li id="nav3" class="active"><a href="{{ URL::route('services') }}">Services<span>for you</span></a></li>
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
			<div class="wrapper">
				<h2 class="under"><cufon class="cufon cufon-canvas" alt="Overview " style="width: 141px; height: 40px;"><canvas width="177" height="48" style="width: 177px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>Overview </cufontext></cufon><cufon class="cufon cufon-canvas" alt="of " style="width: 37px; height: 40px;"><canvas width="72" height="48" style="width: 72px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>of </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Our " style="width: 60px; height: 40px;"><canvas width="96" height="48" style="width: 96px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>Our </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Main " style="width: 79px; height: 40px;"><canvas width="115" height="48" style="width: 115px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>Main </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Business " style="width: 139px; height: 40px;"><canvas width="174" height="48" style="width: 174px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>Business </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Courses" style="width: 118px; height: 40px;"><canvas width="146" height="48" style="width: 146px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>Courses</cufontext></cufon></h2>
				<div class="wrapper">
					<section class="col-1-3">
						<div class="wrap-col">
							<div class="wrapper pad_bot1">
								<figure class="left marg_right1"><img alt="" src="assets/images/page3_img1.gif"></figure>
								<h6><cufon class="cufon cufon-canvas" alt="Strategic " style="width: 72px; height: 20px;"><canvas width="89" height="24" style="width: 89px; height: 24px; top: -4px; left: -1px;"></canvas><cufontext>Strategic </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Planning" style="width: 65px; height: 20px;"><canvas width="78" height="24" style="width: 78px; height: 24px; top: -4px; left: -1px;"></canvas><cufontext>Planning</cufontext></cufon></h6>
								<p>At vero eos et accusamus et iusto odio dignissimo ducimu qui blanditiis praesentium voluptatum deleniti.</p>
							</div>
							<div class="wrapper">
								<figure class="left marg_right1"><img alt="" src="assets/images/page3_img2.gif"></figure>
								<h6><cufon class="cufon cufon-canvas" alt="Risk " style="width: 38px; height: 20px;"><canvas width="56" height="24" style="width: 56px; height: 24px; top: -4px; left: -1px;"></canvas><cufontext>Risk </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Management" style="width: 99px; height: 20px;"><canvas width="116" height="24" style="width: 116px; height: 24px; top: -4px; left: -1px;"></canvas><cufontext>Management</cufontext></cufon></h6>
								<p>Nobis eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas. </p>
							</div>
						</div>
					</section>
					<section class="col-1-3">
						<div class="wrap-col">
							<div class="wrapper pad_bot1">
								<figure class="left marg_right1"><img alt="" src="assets/images/page3_img3.gif"></figure>
								<h6><cufon class="cufon cufon-canvas" alt="Clients " style="width: 56px; height: 20px;"><canvas width="74" height="24" style="width: 74px; height: 24px; top: -4px; left: -1px;"></canvas><cufontext>Clients </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Relationship" style="width: 93px; height: 20px;"><canvas width="106" height="24" style="width: 106px; height: 24px; top: -4px; left: -1px;"></canvas><cufontext>Relationship</cufontext></cufon></h6>
								<p>Atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
							</div>
							<div class="wrapper">
								<figure class="left marg_right1"><img alt="" src="assets/images/page3_img4.gif"></figure>
								<h6><cufon class="cufon cufon-canvas" alt="Investments" style="width: 92px; height: 20px;"><canvas width="105" height="24" style="width: 105px; height: 24px; top: -4px; left: -1px;"></canvas><cufontext>Investments</cufontext></cufon></h6>
								<p>assumenda est, omnis dolor repellendus. Temporibus autem quibusdam aut officiis debitis aut.</p>
							</div>
						</div>
					</section>
					<section class="col-1-3">
						<div class="wrap-col">
							<div class="wrapper pad_bot1">
								<figure class="left marg_right1"><img alt="" src="assets/images/page3_img5.gif"></figure>
								<h6><cufon class="cufon cufon-canvas" alt="Insurance " style="width: 79px; height: 20px;"><canvas width="97" height="24" style="width: 97px; height: 24px; top: -4px; left: -1px;"></canvas><cufontext>Insurance </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Services" style="width: 66px; height: 20px;"><canvas width="79" height="24" style="width: 79px; height: 24px; top: -4px; left: -1px;"></canvas><cufontext>Services</cufontext></cufon></h6>
								<p>Similique sunt in culpa harum quidem rerum facilis est et expedita distinctio namlibero tempore, cum soluta.</p>
							</div>
							<div class="wrapper">
								<figure class="left marg_right1"><img alt="" src="assets/images/page3_img6.gif"></figure>
								<h6><cufon class="cufon cufon-canvas" alt="Sales " style="width: 47px; height: 20px;"><canvas width="64" height="24" style="width: 64px; height: 24px; top: -4px; left: -1px;"></canvas><cufontext>Sales </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Lead " style="width: 42px; height: 20px;"><canvas width="59" height="24" style="width: 59px; height: 24px; top: -4px; left: -1px;"></canvas><cufontext>Lead </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Generation" style="width: 82px; height: 20px;"><canvas width="95" height="24" style="width: 95px; height: 24px; top: -4px; left: -1px;"></canvas><cufontext>Generation</cufontext></cufon></h6>
								<p>Rerum necessitatibus saepe eveniet et voluptates repu- diandae sint et molestiae non recusandae.</p>
							</div>
						</div>
					</section>
				</div>
			</div>

		</article>
	</div>
</div>
@stop