<meta charset="UTF-8">
<?php if ( isset( $title ) ): ?>
	<title><?= $title ?></title>
<?php else : ?>
	<title>AdminLTE | Dashboard</title>
<?php endif; ?>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<meta content="<?=Option::getOption('siteDescription')?>" name="description">
<meta name="csrf-token" content="<?= csrf_token() ?>" />

<!-- bootstrap 3.0.2 -->
<?= Html::style( 'assets/admin/css/bootstrap.min.css' ) ?>
<!-- font Awesome -->
<?= Html::style( 'assets/admin/css/font-awesome.min.css' ) ?>
<!-- Ionicons -->
<?= Html::style( 'assets/admin/css/ionicons.min.css' ) ?>
<!-- Morris chart -->
<?= Html::style( 'assets/admin/css/morris/morris.css' ) ?>
<!-- jvectormap -->
<?= Html::style( 'assets/admin/css/jvectormap/jquery-jvectormap-1.2.2.css' ) ?>
<!-- fullCalendar -->
<?= Html::style( 'assets/admin/css/fullcalendar/fullcalendar.min.css' ) ?>
<!-- Daterange picker -->
<?= Html::style( 'assets/admin/css/daterangepicker/daterangepicker-bs3.css' ) ?>
<!-- Theme style -->
<?= Html::style( 'assets/admin/css/AdminLTE.css' ) ?>
<!-- DATA TABLES -->
<?= Html::style( 'assets/admin/css/datatables/dataTables.bootstrap.css' ) ?>
<?= Html::style( 'assets/admin/css/datatables/jquery.dataTables_themeroller.css' ) ?>
<!-- mini-upload-form -->
	<!-- Google web fonts -->
	<?=Html::style('//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700')?>
	<!-- The main CSS file -->
	<?=Html::style('assets/admin/js/plugins/mini-upload-form/assets/css/style.css')?>
<!--/ mini-upload-form -->
<!-- jquery-file-upload -->
<?= Html::style('assets/admin/js/plugins/jquery-file-upload/css/jquery.fileupload.css')?>
<!--/ jquery-file-upload -->
<!-- iCheck -->
<?= Html::style( 'assets/admin/css/iCheck/minimal/_all.css' ) ?>
<!-- Custom CSS -->
<?= Html::style( 'assets/admin/css/custom.css' ) ?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<?=Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')?>
<?=Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')?>
<![endif]-->
<!-- jQuery 2.1.1 -->
<?=Html::script('assets/js/jquery-2.1.1.min.js')?>