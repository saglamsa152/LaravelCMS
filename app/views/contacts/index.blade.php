@extends('template.default')
@section('header')
<div class="body1">
	<div class="body2">
		<div class="body5">
			<div class="main zerogrid">
				<!-- header -->
				<header>
					<div class="wrapper row">
						<h1><a id="logo" href="{{ URL::route('home') }}"><img src="{{ URL::asset('assets/images/logo.png') }}"></a></h1>
						<nav>
							<ul id="menu">
								<li id="nav1"><a href="{{ URL::route('home') }}">Home<span>Welcome!</span></a></li>
								<li id="nav2"><a href="{{ URL::route('news') }}">News<span>Fresh</span></a></li>
								<li id="nav3"><a href="{{ URL::route('services') }}">Services<span>for you</span></a></li>
								<li id="nav4"><a href="{{ URL::route('products') }}">Products<span>The best</span></a></li>
								<li id="nav5" class="active"><a href="{{ URL::route('contacts') }}">Contacts<span>Our Address</span></a></li>
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
			<div class="wrapper row">
				<section class="col-3-4">
					<div class="wrap-col">
						<h2 class="under"><cufon class="cufon cufon-canvas" alt="Contact " style="width: 119px; height: 40px;"><canvas width="154" height="48" style="width: 154px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>Contact </cufontext></cufon><cufon class="cufon cufon-canvas" alt="form" style="width: 68px; height: 40px;"><canvas width="84" height="48" style="width: 84px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>form</cufontext></cufon></h2>
						<form method="post" id="ContactForm">
							<div>
								<div class="wrapper">
									<span>Your Name:</span>
									<input type="text" class="input">
								</div>
								<div class="wrapper">
									<span>Your City:</span>
									<input type="text" class="input">
								</div>
								<div class="wrapper">
									<span>Your E-mail:</span>
									<input type="text" class="input">
								</div>
								<div class="textarea_box">
									<span>Your Message:</span>
									<textarea rows="1" cols="1" name="textarea"></textarea>
								</div>
								<a onclick="document.getElementById('ContactForm').submit()" href="#">Send</a>
								<a onclick="document.getElementById('ContactForm').reset()" href="#">Clear</a>
							</div>
						</form>
					</div>
				</section>
				<section class="col-1-4">
					<div class="wrap-col">
						<h2 class="under"><cufon class="cufon cufon-canvas" alt="Contacts" style="width: 126px; height: 40px;"><canvas width="154" height="48" style="width: 154px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>Contacts</cufontext></cufon></h2>
						<div id="address"><span>Country:<br>
								City:<br>
								Telephone:<br>
								Email:</span>
							USA<br>
							San Diego<br>
							+354 5635600<br>
							<a class="color2" href="mailto:">elenwhite@mail.com</a></div>
						<h2 class="under"><cufon class="cufon cufon-canvas" alt="Miscellaneous" style="width: 204px; height: 40px;"><canvas width="231" height="48" style="width: 231px; height: 48px; top: -8px; left: -2px;"></canvas><cufontext>Miscellaneous</cufontext></cufon></h2>
						<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium volupta- tum deleniti atque corrupti quos dolores et quas molestias excep- turi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum.</p>
					</div>
				</section>
			</div>

		</article>
	</div>
</div>
@stop

@section('footer')
<div class="body4">
	<div class="main zerogrid">
		<article id="content2">
			<div class="wrapper row">
				<section class="col-1-4">
					<div class="wrap-col">
						<h4><cufon class="cufon cufon-canvas" alt="Why " style="width: 52px; height: 26px;"><canvas width="75" height="32" style="width: 75px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Why </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Us?" style="width: 41px; height: 26px;"><canvas width="57" height="32" style="width: 57px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Us?</cufontext></cufon></h4>
						<ul class="list1">
							<li><a href="#">Lorem ipsum dolor sit</a></li>
							<li><a href="#">Dmet, consectetur</a></li>
							<li><a href="#">Adipisicing elit eiusmod </a></li>
							<li><a href="#">Tempor incididunt ut</a></li>
						</ul>
					</div>
				</section>
				<section class="col-1-4">
					<div class="wrap-col">
						<h4><cufon class="cufon cufon-canvas" alt="Address" style="width: 83px; height: 26px;"><canvas width="101" height="32" style="width: 101px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Address</cufontext></cufon></h4>
						<ul class="address">
							<li><span>Country:</span>USA</li>
							<li><span>City:</span>San Diego</li>
							<li><span>Phone:</span>8 800 154-45-67</li>
							<li><span>Email:</span><a href="mailto:">progress@mail.com</a></li>
						</ul>
					</div>
				</section>
				<section class="col-1-4">
					<div class="wrap-col">
						<h4><cufon class="cufon cufon-canvas" alt="Follow " style="width: 72px; height: 26px;"><canvas width="94" height="32" style="width: 94px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Follow </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Us" style="width: 28px; height: 26px;"><canvas width="45" height="32" style="width: 45px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Us</cufontext></cufon></h4>
						<ul id="icons">
							<li><a href="#"><img alt="" src="images/icon1.jpg">Facebook</a></li>
							<li><a href="#"><img alt="" src="images/icon2.jpg">Twitter</a></li>
							<li><a href="#"><img alt="" src="images/icon3.jpg">LinkedIn</a></li>
							<li><a href="#"><img alt="" src="images/icon4.jpg">Delicious</a></li>
						</ul>
					</div>
				</section>
				<section class="col-1-4">
					<div class="wrap-col">
						<h4><cufon class="cufon cufon-canvas" alt="Newsletter" style="width: 106px; height: 26px;"><canvas width="128" height="32" style="width: 128px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Newsletter</cufontext></cufon></h4>
						<form method="post" id="newsletter">
							<div>
								<div class="wrapper">
									<input type="text" onfocus="if(this.value =='Type Your Email Here' ) this.value=''" onblur="if(this.value=='') this.value='Type Your Email Here'" value="Type Your Email Here" class="input">
								</div>
								<a onclick="document.getElementById('newsletter').submit()" class="button" href="#">Subscribe</a>
							</div>
						</form>
					</div>
				</section>
			</div>
		</article>
		<!-- content end -->
	</div>
</div>
@stop
