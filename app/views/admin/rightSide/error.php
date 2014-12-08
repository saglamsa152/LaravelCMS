<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small><?= _( 'Menage Profile' ) ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i class="fa fa-dashboard"></i> <?= _( 'Home' ) ?>
				</a></li>
			<li class="active"><?= _( 'Error page' ) ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<?php if ( $errors->count() > 0 ):
			foreach ( $errors->all() as $error ):?>
			<div class="error-page">
			<h2 class="headline text-info">&nbsp; <i class="fa fa-minus-circle text-red"></i></h2>
			<div class="error-content">
				<h3><?=$error?></h3>
				<a href="#" onclick="history.back()" class="btn btn-primary"><i class="fa fa-reply"></i> <?=_('Go Back')?></a>
				<?php if ( userCan( 'viewDashboard' )): ?>
					<a href="<?= URL::action( 'AdminController@getIndex' ) ?>" class="btn btn-primary"><i class="fa fa-dashboard"></i> <?=_('Dashboard')?></a>
				<?php else: ?>
					<a href="<?= URL::action( 'AdminController@getProfile' ) ?>" class="btn btn-primary"><i class="fa fa-user"></i> <?=_('Profile')?></a>
				<?php endif ?>
			</div><!-- /.error-content -->
		</div><!-- /.error-page -->
			<?php endforeach;
		endif?>
	</section><!-- /.content -->
</aside><!-- /.right-side -->