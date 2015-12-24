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
                <b><?= _( 'Alert!' ) ?></b> <?= $error ?>
            </div>
        <?php
        endforeach;
    endif;
    ?>
    <div class="login-box-body">
        <p class="login-box-msg"><?=_('Sign in to start your session')?></p>
        <?=
        Form::open( array(
            'role'   => 'form',
            'method' => 'post',
            'action' => 'AdminController@postLogin'
        ) ) ?>
            <div class="form-group has-feedback">
                <?= Form::text( 'username', Input::old( 'username' ), array( 'class' => 'form-control', 'autofocus', 'id' => 'username', 'placeholder' => _( 'Username' ) ) ) ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php echo Form::password( 'password', array( 'class' => 'form-control', 'id' => 'password', 'placeholder' => _( 'Password' ) ) ) ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <?= Form::checkbox( 'remember' ) ?> <?= _( 'Remember me' ) ?>
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <?= Form::button( _( 'Sing in' ), array( 'class' => 'btn btn-primary btn-block btn-flat', 'type' => 'submit' ) ) ?>
                </div><!-- /.col -->
            </div>
        </form>

        <!--div class="social-auth-links text-center">
            <p>- <?=_('OR')?> -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i><?=_('Sign in using Facebook')?> </a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i><?=_(' Sign in using Google+')?></a>
        </div><!-- /.social-auth-links -->

        <a href="<?=URL::action('Auth\PasswordController@getEmail')?>"><?= _( 'I forgot my password' ) ?></a><br>
        <?= link_to_action( 'AdminController@getRegister', _( 'Register a new membership' ), '', array( 'class' => 'text-center' ) ) ?>

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