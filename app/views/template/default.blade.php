<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	{{ HTML::style('assets/css/reset.css')}}
	{{ HTML::style('assets/css/layout.css')}}
	{{ HTML::style('assets/css/style.css')}}
	{{ HTML::style('assets/css/zerogrid.css')}}
	{{ HTML::style('assets/css/responsive.css')}}
	{{ HTML::style('assets/css/responsiveslides.css')}}
	{{ HTML::script('assets/js/jquery-1.6.js',array('type'=>'text/javascript'))}}
	{{ HTML::script('assets/js/cufon-yui.js',array('type'=>'text/javascript'))}}
	{{ HTML::script('assets/js/cufon-replace.js',array('type'=>'text/javascript'))}}
	{{ HTML::script('assets/js/Swis721_Cn_BT_400.font.js',array('type'=>'text/javascript'))}}
	{{ HTML::script('assets/js/Swis721_Cn_BT_700.font.js',array('type'=>'text/javascript'))}}
	{{ HTML::script('assets/js/jquery.easing.1.3.js',array('type'=>'text/javascript'))}}
	{{ HTML::script('assets/js/tms-0.3.js',array('type'=>'text/javascript'))}}
	{{ HTML::script('assets/js/tms_presets.js',array('type'=>'text/javascript'))}}
	{{ HTML::script('assets/js/jcarousellite.js',array('type'=>'text/javascript'))}}
	{{ HTML::script('assets/js/script.js',array('type'=>'text/javascript'))}}
	{{ HTML::script('assets/js/css3-mediaqueries.js',array('type'=>'text/javascript'))}}
	<!--[if lt IE 9]>
	{{ HTML::script('assets/js/html5.js');}}
	<style type="text/css">
		.bg {
			behavior: url(assets/js/PIE.htc);
		}
	</style>
	<![endif]-->
	<!--[if lt IE 7]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" alt="" /></a>
	</div>
	<![endif]-->

	{{ HTML::script('assets/js/responsiveslides.js');}}
	<script>
		$(function () {
			$("#slider").responsiveSlides({
				auto     : true,
				pager    : false,
				nav      : true,
				speed    : 500,
				maxwidth : 960,
				namespace: "centered-btns"
			});
		});
	</script>

</head>
<body>
@yield('header')

@yield('content')

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
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>