<?php use App\Models\Option;
use Illuminate\Support\Facades\URL;
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
<body class="register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="<?=Url::action('HomeController@getIndex')?>"><b>Admin</b>LTE</a>
    </div>
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
    <div class="register-box-body">
        <p class="login-box-msg"><?=_('Register a new membership')?></p>
        <?=
        Form::open( array(
            'role'   => 'form',
            'method' => 'post',
            'action' => 'AdminController@postRegister'
        ) )?>
            <div class="form-group has-feedback">
                <?=Form::email('email',Input::old('email'),array('class'=>'form-control','autofocus','id'=>'email','placeholder'=>'E-mail'))?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?=Form::text('username',Input::old('username'),array('class'=>'form-control','id'=>'username','placeholder'=>_('Username')))?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?=Form::password('password',array('class'=>'form-control','id'=>'password','placeholder'=>'Password'))?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?=Form::password('password_confirmation',array('class'=>'form-control','id'=>'password_confirmation','placeholder'=>_('Password Confirm')))?>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <!--<div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>-->
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <?=Form::button(_('Sign me up'),array('class'=>'btn btn-primary btn-block btn-flat','type'=>'submit'))?>
                </div><!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i><?=_('Sign up using Facebook')?> </a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i><?=_('Sign up using Google+')?> </a>
        </div>

        <?=link_to_action('AdminController@getLogin',_('I already have a membership'),'',array('class'=>'text-center'))?>
    </div><!-- /.form-box -->
</div><!-- /.register-box -->
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