<?php
use App\Models\Option;
use Collective\Html\HtmlFacade;
if ( Auth::check() ) {
	echo Redirect::intended( '/admin' );
}
?>
<!DOCTYPE html>
<html class="bg-black">
<head>
	<meta charset="UTF-8">
	<?php if ( isset( $title ) ): ?>
		<title><?= $title ?></title>
	<?php else : ?>
		<title><?=Option::getOption('siteName')?></title>
	<?php endif; ?>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- bootstrap 3.0.2 -->
	<?= Html::style( 'assets/admin/css/bootstrap.min.css' ) ?>
	<!-- font Awesome -->
	<?= Html::style( 'assets/admin/css/font-awesome.min.css' ) ?>
	<!-- Theme style -->
	<?= Html::style( 'assets/admin/css/AdminLTE.css' ) ?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<?=Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')?>
	<?=Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')?>
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
	<div class="header"><?=_('Register New Membership')?></div>
	<?=
	Form::open( array(
			'role'   => 'form',
			'method' => 'post',
			'action' => 'AdminController@postRegister'
	) )?>
	<div class="body bg-gray">
		<div class="form-group">
			<?=Form::email('email',Input::old('email'),array('class'=>'form-control','autofocus','id'=>'email','placeholder'=>'E-mail'))?>
		</div>
		<div class="form-group">
			<?=Form::text('username',Input::old('username'),array('class'=>'form-control','id'=>'username','placeholder'=>_('Username')))?>
		</div>
		<div class="form-group">
			<?=Form::password('password',array('class'=>'form-control','id'=>'password','placeholder'=>'Password'))?>
		</div>
		<div class="form-group">
			<?=Form::password('password_confirmation',array('class'=>'form-control','id'=>'password_confirmation','placeholder'=>_('Password Confirm')))?>
		</div>
	</div>
	<div class="footer">
		<?=Form::button(_('Sign me up'),array('class'=>'btn bg-olive btn-block','type'=>'submit'))?>

		<?=link_to_action('AdminController@getLogin',_('I already have a membership'),'',array('class'=>'text-center'))?>
	</div>
	<?= Form::close() ?>
	<div class="margin text-center">
		<span><?=_('Register using social networks')?></span>
		<br />
		<button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
		<button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
		<button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

	</div>
</div>


<!-- jQuery 2.1.1 -->
<?=Html::script('assets/js/jquery-2.1.1.min.js')?>
<!-- Bootstrap -->
<?= Html::script( 'assets/admin/js/bootstrap.min.js' ) ?>

</body>
</html>