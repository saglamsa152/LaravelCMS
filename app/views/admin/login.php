<?php
if ( Auth::check() ) {
	echo Redirect::intended( '/admin' );
}
?>
<!DOCTYPE html>
<html class="bg-black">
<head>
	<meta charset="UTF-8">
	<title>AdminLTE | Log in</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- bootstrap 3.0.2 -->
	<?= HTML::style( 'assets/admin/css/bootstrap.min.css' ) ?>
	<!-- font Awesome -->
	<?= HTML::style( 'assets/admin/css/font-awesome.min.css' ) ?>
	<!-- Theme style -->
	<?= HTML::style( 'assets/admin/css/AdminLTE.css' ) ?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<?=HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')?>
	<?=HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')?>
	<![endif]-->
</head>
<body class="bg-black">

<div class="form-box" id="login-box">
	<?php if ( $errors->count() > 0 ):
		foreach ( $errors->all() as $error ):?>
			<div class="alert alert-danger alert-dismissable">
				<i class="fa fa-ban"></i>
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<b><?= _( 'Alert!' ) ?></b> <?= $error ?>
			</div>
		<?php
		endforeach;
	endif;
	?>
	<div class="header"><?= _( 'Sign In' ) ?></div>
	<?=
	Form::open( array(
			'role'   => 'form',
			'method' => 'post',
			'action' => 'AdminController@postLogin'
	) ) ?>
	<div class="body bg-gray">
		<div class="form-group">
			<?= Form::text( 'username', Input::old( 'username' ), array( 'class' => 'form-control', 'autofocus', 'id' => 'username', 'placeholder' => _( 'Username' ) ) ) ?>
		</div>
		<div class="form-group">
			<?php echo Form::password( 'password', array( 'class' => 'form-control', 'id' => 'password', 'placeholder' => _( 'Password' ) ) ) ?>
		</div>
		<div class="form-group">
			<?= Form::checkbox( 'remember' ) ?> <?= _( 'Remember me' ) ?>
		</div>
	</div>
	<div class="footer">
		<?= Form::button( _( 'Sing in' ), array( 'class' => 'btn bg-olive btn-block', 'type' => 'submit' ) ) ?>

		<p><a href="#"><?= _( 'I forgot my password' ) ?></a></p>

		<?= link_to_action( 'AdminController@getRegister', _( 'Register a new membership' ), '', array( 'class' => 'text-center' ) ) ?>
	</div>
	<?= Form::close() ?>

	<div class="margin text-center">
		<span><?= _( 'Sign in using social networks' ) ?></span>
		<br />
		<button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
		<button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
		<button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

	</div>
</div>


<!-- jQuery 2.0.2 -->
<?= HTML::script( 'http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js' ) ?>
<!-- Bootstrap -->
<?= HTML::script( 'assets/admin/js/bootstrap.min.js' ) ?>

</body>
</html>