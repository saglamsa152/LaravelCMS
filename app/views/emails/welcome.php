<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<!-- bootstrap 3.0.2 -->
	<?= HTML::style( 'assets/admin/css/bootstrap.min.css' ) ?>
</head>
<body>
<h2><?php echo _('New User')?></h2>

<div>
Üyeliğiniz oluşturulmuştur.<br>
	Kullanıcı Adınız:<?=$username?><br>
	Şifreniz :<?=$password?><br>
<a class="btn btn-primary" href="<?=URL::action('AdminController@getLogin')?>"><?=_('Login')?></a>
</div>
</body>
</html>