<?php use Collective\Html\HtmlFacade;
?>
<!DOCTYPE Html>
<Html lang="en">
<head>
	@if(isset($title))
	<title>{!!$title!!}</title>
	@else
	<title>Progresss</title>
	@endif
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--todo eklenecek  her  dosya için  bir  isim  belirleyip  aktif sayfada gerekli olan dosyalar  nelerse sadece onların  yüklenmesi  sağlanabilir.-->
	{!! Html::style('assets/css/reset.css')!!}
	{!! Html::style('assets/css/layout.css')!!}
	{!! Html::style('assets/css/style.css')!!}
	{!! Html::style('assets/css/zerogrid.css')!!}
	{!! Html::style('assets/css/responsive.css')!!}
	{!! Html::style('assets/css/responsiveslides.css')!!}
	{!! Html::script('assets/js/jquery-1.6.js',array('type'=>'text/javascript'))!!}
	{!! Html::script('assets/js/jquery.easing.1.3.js',array('type'=>'text/javascript'))!!}
	{!! Html::script('assets/js/tms-0.3.js',array('type'=>'text/javascript'))!!}
	{!! Html::script('assets/js/tms_presets.js',array('type'=>'text/javascript'))!!}
	{!! Html::script('assets/js/jcarousellite.js',array('type'=>'text/javascript'))!!}
	{!! Html::script('assets/js/script.js',array('type'=>'text/javascript'))!!}
	{!! Html::script('assets/js/css3-mediaqueries.js',array('type'=>'text/javascript'))!!}
	<!--[if lt IE 9]>
	{!! Html::script('assets/js/Html5.js')!!}
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

	{!! Html::script('assets/js/responsiveslides.js')!!}
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
				<section class="col-1-3">
					<div class="wrap-col">
						<h4> <?php echo _('Why Us?')?> </h4>
						<ul class="list1">
							<li><a href="#">Lorem ipsum dolor sit</a></li>
							<li><a href="#">Dmet, consectetur</a></li>
							<li><a href="#">Adipisicing elit eiusmod </a></li>
							<li><a href="#">Tempor incididunt ut</a></li>
						</ul>
					</div>
				</section>
				<section class="col-1-3">
					<div class="wrap-col">
						<h4><?php echo _('Address')?></h4>
						<ul class="address">
							<li><span><?php echo _('Country:')?></span>Türkiye</li>
							<li><span><?php echo _('City:')?></span>Samsun</li>
							<li><span><?php echo _('Phone:')?></span>+90555 555 5555</li>
							<li><span><?php echo _('Email:')?></span><a href="mailto:"><?=$mainMailAddress?></a></li>
						</ul>
					</div>
				</section>
				<section class="col-1-3">
					<div class="wrap-col">
						<h4> <?php echo _('Follow Us')?></h4>
						<ul id="icons">
							<li><a href="#"><img alt="" src="{!! URL::asset('assets/images/icon1.jpg')!!}">Facebook</a></li>
							<li><a href="#"><img alt="" src="{!! URL::asset('assets/images/icon2.jpg')!!}">Twitter</a></li>
							<li><a href="#"><img alt="" src="{!! URL::asset('assets/images/icon3.jpg')!!}">LinkedIn</a></li>
							<li><a href="#"><img alt="" src="{!! URL::asset('assets/images/icon4.jpg')!!}">Delicious</a></li>
						</ul>
					</div>
				</section>
			</div>
		</article>
		<!-- content end -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</Html>