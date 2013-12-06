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
								<li id="nav4" class="active"><a href="{{ URL::route('products') }}">Products<span>The best</span></a></li>
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
				<section class="col-1-3">
					<div class="wrap-col">
						<div class="wrapper pad_bot2">
							<h3><span class="dropcap"><cufon class="cufon cufon-canvas" alt="1" style="width: 20px; height: 38px;"><canvas width="41" height="46" style="width: 41px; height: 46px; top: -8px; left: -1px;"></canvas><cufontext>1</cufontext></cufon></span><cufon class="cufon cufon-canvas" alt="Product " style="width: 85px; height: 26px;"><canvas width="108" height="32" style="width: 108px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Product </cufontext></cufon><cufon class="cufon cufon-canvas" alt="name" style="width: 56px; height: 26px;"><canvas width="74" height="32" style="width: 74px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>name</cufontext></cufon></h3>
							<figure><img alt="" src="images/page4_img1.jpg"></figure>
							<p class="pad_bot1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
							<a class="link1" href="#">Read More</a>
						</div>
						<div class="wrapper">
							<h3><span class="dropcap"><cufon class="cufon cufon-canvas" alt="4" style="width: 20px; height: 38px;"><canvas width="41" height="46" style="width: 41px; height: 46px; top: -8px; left: -1px;"></canvas><cufontext>4</cufontext></cufon></span><cufon class="cufon cufon-canvas" alt="Product " style="width: 85px; height: 26px;"><canvas width="108" height="32" style="width: 108px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Product </cufontext></cufon><cufon class="cufon cufon-canvas" alt="name" style="width: 56px; height: 26px;"><canvas width="74" height="32" style="width: 74px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>name</cufontext></cufon></h3>
							<figure><img alt="" src="images/page4_img2.jpg"></figure>
							<p class="pad_bot1">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese- runt mollit anim id est laborum.</p>
							<a class="link1" href="#">Read More</a>
						</div>
					</div>
				</section>
				<section class="col-1-3">
					<div class="wrap-col">
						<div class="wrapper pad_bot2">
							<h3><span class="dropcap"><cufon class="cufon cufon-canvas" alt="2" style="width: 20px; height: 38px;"><canvas width="41" height="46" style="width: 41px; height: 46px; top: -8px; left: -1px;"></canvas><cufontext>2</cufontext></cufon></span><cufon class="cufon cufon-canvas" alt="Product " style="width: 85px; height: 26px;"><canvas width="108" height="32" style="width: 108px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Product </cufontext></cufon><cufon class="cufon cufon-canvas" alt="name" style="width: 56px; height: 26px;"><canvas width="74" height="32" style="width: 74px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>name</cufontext></cufon></h3>
							<figure><img alt="" src="images/page4_img3.jpg"></figure>
							<p class="pad_bot1">Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exea.</p>
							<a class="link1" href="#">Read More</a>
						</div>
						<div class="wrapper">
							<h3><span class="dropcap"><cufon class="cufon cufon-canvas" alt="5" style="width: 20px; height: 38px;"><canvas width="41" height="46" style="width: 41px; height: 46px; top: -8px; left: -1px;"></canvas><cufontext>5</cufontext></cufon></span><cufon class="cufon cufon-canvas" alt="Product " style="width: 85px; height: 26px;"><canvas width="108" height="32" style="width: 108px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Product </cufontext></cufon><cufon class="cufon cufon-canvas" alt="name" style="width: 56px; height: 26px;"><canvas width="74" height="32" style="width: 74px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>name</cufontext></cufon></h3>
							<figure><img alt="" src="images/page4_img4.jpg"></figure>
							<p class="pad_bot1">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
							<a class="link1" href="#">Read More</a>
						</div>
					</div>
				</section>
				<section class="col-1-3">
					<div class="wrap-col">
						<div class="wrapper pad_bot2">
							<h3><span class="dropcap"><cufon class="cufon cufon-canvas" alt="3" style="width: 20px; height: 38px;"><canvas width="41" height="46" style="width: 41px; height: 46px; top: -8px; left: -1px;"></canvas><cufontext>3</cufontext></cufon></span><cufon class="cufon cufon-canvas" alt="Product " style="width: 85px; height: 26px;"><canvas width="108" height="32" style="width: 108px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Product </cufontext></cufon><cufon class="cufon cufon-canvas" alt="name" style="width: 56px; height: 26px;"><canvas width="74" height="32" style="width: 74px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>name</cufontext></cufon></h3>
							<figure><img alt="" src="images/page4_img5.jpg"></figure>
							<p class="pad_bot1">Commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
							<a class="link1" href="#">Read More</a>
						</div>
						<div class="wrapper">
							<h3><span class="dropcap"><cufon class="cufon cufon-canvas" alt="6" style="width: 20px; height: 38px;"><canvas width="41" height="46" style="width: 41px; height: 46px; top: -8px; left: -1px;"></canvas><cufontext>6</cufontext></cufon></span><cufon class="cufon cufon-canvas" alt="Product " style="width: 85px; height: 26px;"><canvas width="108" height="32" style="width: 108px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>Product </cufontext></cufon><cufon class="cufon cufon-canvas" alt="name" style="width: 56px; height: 26px;"><canvas width="74" height="32" style="width: 74px; height: 32px; top: -5px; left: -1px;"></canvas><cufontext>name</cufontext></cufon></h3>
							<figure><img alt="" src="images/page4_img6.jpg"></figure>
							<p class="pad_bot1">Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
							<a class="link1" href="#">Read More</a>
						</div>
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
