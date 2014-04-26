<meta charset="UTF-8">
<?php if ( isset( $title ) ): ?>
	<title><?= $title ?></title>
<?php else : ?>
	<title>AdminLTE | Dashboard</title>
<?php endif; ?>

<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- bootstrap 3.0.2 -->
<?= HTML::style( 'assets/admin/css/bootstrap.min.css' ) ?>
<!-- font Awesome -->
<?= HTML::style( 'assets/admin/css/font-awesome.min.css' ) ?>
<!-- Ionicons -->
<?= HTML::style( 'assets/admin/css/ionicons.min.css' ) ?>
<!-- Morris chart -->
<?= HTML::style( 'assets/admin/css/morris/morris.css' ) ?>
<!-- jvectormap -->
<?= HTML::style( 'assets/admin/css/jvectormap/jquery-jvectormap-1.2.2.css' ) ?>
<!-- fullCalendar -->
<?= HTML::style( 'assets/admin/css/fullcalendar/fullcalendar.css' ) ?>
<!-- Daterange picker -->
<?= HTML::style( 'assets/admin/css/daterangepicker/daterangepicker-bs3.css' ) ?>
<!-- bootstrap wysihtml5 - text editor -->
<?= HTML::style( 'assets/admin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' ) ?>
<!-- Theme style -->
<?= HTML::style( 'assets/admin/css/AdminLTE.css' ) ?>
<!-- DATA TABLES -->
<?= HTML::style( 'assets/admin/css/datatables/dataTables.bootstrap.css' ) ?>
<!-- Custom CSS -->
<?= HTML::style( 'assets/admin/css/custom.css' ) ?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<?=HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')?>
<?=HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')?>
<![endif]-->