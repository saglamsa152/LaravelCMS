<?php use Illuminate\Support\Facades\URL;
if ( Auth::check() ) {
	echo Redirect::intended( '/admin' );
}
?>
		<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<?php if ( isset( $title ) ): ?>
	<title><?= $title ?></title>
	<?php else : ?>
	<title><?=Option::getOption('siteName')?></title>
	<?php endif; ?>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- Bootstrap 3.3.4 -->
	<?=Html::style('/assets/bootstrap/css/bootstrap.min.css')?>
			<!-- Font Awesome Icons -->
	<?=Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css')?>
			<!-- Theme style -->
	<?=Html::style('/assets/admin/css/AdminLTE.min.css')?>
			<!-- iCheck -->
	<?=Html::style('/assets/admin/plugins/iCheck/square/blue.css')?>

			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="<?=Url::action('HomeController@getIndex')?>"><b>Admin</b>LTE</a>
	</div><!-- /.login-logo -->
	<?php if ( $errors->count() > 0 ):
	foreach ( $errors->all() as $error ):?>
	<div class="alert alert-danger alert-dismissable">
		<i class="fa fa-ban"></i>
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		<b><?= _('Alert!') ?></b> <?= $error ?>
	</div>
	<?php endforeach;
	endif; ?>
	<div class="login-box-body">
		<p class="login-box-msg"><?=_('Password Remind')?></p>
		<?=
		Form::open( array(
				'role'   => 'form',
				'method' => 'post',
				'action' => 'Auth\PasswordController@postReset',
				'class'  => 'ajaxForm'
		) ) ?>
		<input type="hidden" name="token" value="<?=$token?>">
		<div class="form-group has-feedback">
			<?=Form::email('email',Input::old('email'),array('class'=>'form-control','autofocus','id'=>'email','placeholder'=>_( 'Enter your email adress' )))?>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<?=Form::password('password',array('class'=>'form-control','id'=>'password','placeholder'=>'Password'))?>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<?=Form::password('password_confirmation',array('class'=>'form-control','id'=>'password_confirmation','placeholder'=>_('Password Confirm')))?>
			<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		</div>
		<div class="form-group">
			<?= Form::button(_('Submit'), array('class' => 'btn btn-primary btn-block btn-flat', 'type' => 'submit')) ?>
		</div>
		<?=Form::close()?>
	</div><!-- /.login-box-body -->
</div><!-- /.login-box -->
<!-- jQuery 2.1.4 -->
<?=Html::script('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js')?>
		<!-- Bootstrap -->
<?= Html::script( 'assets/bootstrap/js/bootstrap.min.js' ) ?>
		<!-- iCheck -->
<?=Html::script('assets/admin/plugins/iCheck/icheck.min.js')?>
<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
</script>
</body>
</html>