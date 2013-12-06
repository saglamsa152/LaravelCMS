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

@yield('footer')
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>