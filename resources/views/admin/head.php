<meta charset="UTF-8">
<?php if ( isset( $title ) ): ?>
	<title><?= $title ?></title>
<?php else : ?>
	<title>AdminLTE | Dashboard</title>
<?php endif; ?>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<meta content="<?=Option::getOption('siteDescription')?>" name="description">
<meta name="csrf-token" content="<?= csrf_token() ?>" />

<!-- Bootstrap 3.3.4 -->
<?= Html::style( 'assets/bootstrap/css/bootstrap.min.css' ) ?>
<!-- FontAwesome 4.3.0 -->
<?= Html::style( 'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' ) ?>
<!-- Ionicons 2.0.1 -->
<?= Html::style( 'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' ) ?>
<!-- Theme style -->
<?= Html::style( 'assets/admin/css/AdminLTE.min.css' ) ?>
<!-- AdminLTE Skins. Choose a skin from the css/skins
	 folder instead of downloading all of them to reduce the load.
	  todo panelden seçilen skin e göre o css in yüklenmesi sayfa boyutu açısından daha iyi olur-->
<?= Html::style( 'assets/admin/css/skins/_all-skins.min.css' ) ?>
<!-- iCheck -->
<?= Html::style( 'assets/admin/plugins/iCheck/minimal/_all.css' ) ?>
<!-- Morris chart -->
<?= Html::style( 'assets/admin/plugins/morris/morris.css' ) ?>
<!-- jvectormap -->
<?= Html::style( 'assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css' ) ?>
<!-- Date Picker -->
<?=Html::style( 'assets/admin/plugins/datepicker/datepicker3.css')?>
<!-- Daterange picker -->
<?= Html::style( 'assets/admin/plugins/daterangepicker/daterangepicker-bs3.css' ) ?>
<!-- bootstrap wysihtml5 - text editor todo bun kullamıyorum yerine ckeditor var tema güncellemesi sonrası kaldırılacak -->
<link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<?=Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')?>
<?=Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')?>
<![endif]-->

<!-- Admin LTE index'te olmayan -->

<!-- fullCalendar -->
<?= Html::style( 'assets/admin/plugins/fullcalendar/fullcalendar.min.css' ) ?>
<!-- DATA TABLES -->
<?= Html::style( 'assets/admin/plugins/datatables/dataTables.bootstrap.css' ) ?>
<?= Html::style( 'assets/admin/plugins/datatables/jquery.dataTables_themeroller.css' ) ?>

<!-- mini-upload-form -->
	<!-- Google web fonts -->
	<?=Html::style('//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700')?>
	<!-- The main CSS file -->
	<?=Html::style('assets/admin/plugins/mini-upload-form/assets/css/style.css')?>
<!--/ mini-upload-form -->

<!-- jquery-file-upload -->
<?= Html::style('assets/admin/plugins/jquery-file-upload/css/jquery.fileupload.css')?>
<!--/ jquery-file-upload -->

<!-- Custom CSS -->
<?= Html::style( 'assets/admin/css/custom.css' ) ?>

<!-- jQuery 2.1.4  jquery AdminLTE de head kısmında değil -->
<?=Html::script('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js')?>