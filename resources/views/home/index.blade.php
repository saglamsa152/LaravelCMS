<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS -->
    <!-- all Pages -->
    <title>{{$title}}</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <?= Html::favicon('assets/home/images/favicon.ico') ?>
    <?= Html::style('assets/home/css/grid.css') ?>
    <?= Html::style('assets/home/css/style.css') ?>
    <!-- all Pages -->
    <!-- only Default -->
    @if('default'===$contentName)
    <?= Html::style('assets/home/css/camera.css') ?>
    @endif
    <!-- /only Default -->
    <!-- default and about -->
    @if('default'===$contentName || 'about'===$contentName)
    <?= Html::style('assets/home/css/owl.carousel.css') ?>
    @endif
    <!-- /default and about -->
    <!-- only contact -->
    @if('contact'===$contentName)
    <?= Html::style('assets/home/css/contact-form.css') ?>
    @endif
    <!-- /only contact -->
    <!-- only service -->
    @if('service'===$contentName)
    <?= Html::style('assets/home/css/isotope.css') ?>
    @endif
    <!-- /only service -->
    <!-- /CSS -->

    <!-- Script -->
    <!-- all Pages -->
    <?=Html::script('assets/home/js/jquery.js')?>
    <?=Html::script('assets/home/js/jquery-migrate-1.2.1.js')?>
    <?=Html::script('assets/home/js/jquery.equalheights.js')?>
    <!-- /all Pages -->
    <!-- only Default -->
    @if('default'===$contentName)
    <!--[if (gt IE 9)|!(IE)]><!-->
    <?=Html::script('assets/home/js/jquery.mobile.customized.min.js')?>
    @endif
    <!--<![endif]-->
    <?=Html::script('assets/home/js/camera.js')?>
    <!-- /only Default -->
    <!-- default and about -->
    @if('default'===$contentName || 'about'===$contentName)
    <?=Html::script('assets/home/js/owl.carousel.js')?>
    @endif
    <!-- /default and about -->
    <!-- only contact -->
    @if('contact'===$contentName)
    <?=Html::script('assets/home/js/modal.js')?>
    <?=Html::script('assets/home/js/TMForm.js')?>
    @endif
    <!-- /only contact -->
    <!-- only service -->
    @if('service'===$contentName)
    <?=Html::script('assets/home/js/isotope.min.js')?>
    @endif
    <!-- /only service -->
    <!-- /Script -->

    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                 height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <?=Html::script('assets/home/js/html5shiv.js')?>
    <?= Html::style( 'assets/home/css/ie.css' ) ?>
    <![endif]-->

    <!-- For sercvice page -->


            <!-- /For sercvice page -->

</head>
<body>
<div class="page">
    <!--========================================================
                              HEADER
    =========================================================-->
    @include('home.header')
            <!--========================================================
                              CONTENT
    =========================================================-->
    @include("home.content.$contentName")

    <div class="container">
        <div class="row wrap_9 wrap_4 wrap_10">
            <div class="grid_12">
                <div class="header_1 wrap_3 color_3">
                    Get in Touch
                </div>
                <div class="box_3">
                    <ul class="list_1">
                        <li><a class="fa fa-twitter" href="#"></a></li>
                        <li><a class="fa fa-facebook" href="#"></a></li>
                        <li><a class="fa fa-google-plus" href="#"></a></li>
                        <li><a class="fa fa-pinterest" href="#"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--========================================================
                          FOOTER
=========================================================-->
@include('home.footer')
<?=Html::script('assets/home/js/script.js')?>
</body>
</html>