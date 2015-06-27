<!DOCTYPE html>
<html class="bg-black">
<head>
	<meta charset="UTF-8">
	<?php if ( isset( $title ) ): ?>
		<title><?= $title ?></title>
	<?php else : ?>
		<title>AdminLTE | Password Remind</title>
	<?php endif; ?>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- bootstrap 3.0.2 -->
	<?= Html::style( 'assets/admin/css/bootstrap.min.css' ) ?>
	<!-- font Awesome -->
	<?= Html::style( 'assets/admin/css/font-awesome.min.css' ) ?>
	<!-- Theme style -->
	<?= Html::style( 'assets/admin/css/AdminLTE.css' ) ?>
	<!-- Custom CSS -->
	<?= Html::style( 'assets/admin/css/custom.css' ) ?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<?=Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')?>
	<?=Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')?>
	<![endif]-->
</head>
<body class="bg-black">

<div class="form-box" id="login-box">
	<?php if ( isset($error) ):?>
			<div class="alert alert-danger alert-dismissable">
				<i class="fa fa-ban"></i>
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<b><?= _( 'Alert!' ) ?></b> <?= $error ?>
			</div>
	<?php	endif ?>
	<?php if ( isset($status) ):?>
		<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			<b><?= _( 'Success!' ) ?></b> <?= $status ?>
		</div>
	<?php	endif ?>
	<div class="header"><?= _( 'Password Remind' ) ?></div>
	<?=
	Form::open( array(
			'role'   => 'form',
			'method' => 'post',
			'action' => 'RemindersController@postRemind',
			'class'  => 'ajaxForm'
	) ) ?>
	<div class="body bg-gray">
		<div class="form-group">
			<?=Form::email('email',Input::old('email'),array( 'class' => 'form-control', 'autofocus', 'id' => 'email', 'placeholder' => _( 'Enter your email adress' ) ))?>
		</div>
	</div>
	<div class="footer">
		<?= Form::button( _( 'Submit' ), array( 'class' => 'btn bg-olive btn-block', 'type' => 'submit' ) ) ?>
	</div>
	<?= Form::close() ?>

</div>


<!-- jQuery 2.1.1 -->
<?=Html::script('assets/js/jquery-2.1.1.min.js')?>
<!-- Bootstrap -->
<?= Html::script( 'assets/admin/js/bootstrap.min.js' ) ?>
<!-- Custom Js-->
<?=Html::script('assets/admin/js/custom.js')?>
<?=Html::script('assets/admin/js/gettext.php')?>
<?=Html::script('assets/admin/js/ajax.js')?>

</body>
</html>