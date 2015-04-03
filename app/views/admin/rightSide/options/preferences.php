<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small><?= _( 'Menage Site Preferences' ) ?></small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i class="fa fa-dashboard"></i> <?= _( 'Admin Home' ) ?>
				</a></li>
			<li class="active"><?= $title ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">

				<div class="box ">
					<div class="box-header">
						<h3 class="box-title"><?= _( 'Site Preferences' ) ?></h3>
					</div><!-- /.box-header-->
					<div class="box-body">
						<?= Form::open( array(
								'role'   => 'form',
								'id'     => 'siteOptions',
								'class'  => 'form-horizontal ajaxForm',
								'method' => 'post',
								'action' => 'OptionsController@postSave',
								'title'  => _( 'Save Options' ) ) )
						?>
						<?= Form::hidden( 'type', 'preference' ) ?>
						<!-- Theme Skin -->
						<div class="form-group">
							<?= Form::label( 'options[themeSkin]', _( 'Theme Skin' ), array( 'class' => 'control-label col-md-2' ) ) ?>
							<div class=" col-md-4">
								<?= Form::select('options[themeSkin]',array('skin-blue'=>'Blue','skin-black'=>'Black'),Option::getOption( 'themeSkin','preference' ),array( 'class' => 'form-control' ))?>
							</div>
						</div>

					</div><!-- /.box-body-->
					<div class="box-footer clearfix">
						<?= Form::button( _( 'Save' ) . ' <i class="fa fa-arrow-circle-right"></i>', array( 'class' => 'pull-right btn btn-default', 'type' => 'submit' ) ) ?>
						<?= Form::close(); ?>

					</div><!-- /.box-footer -->
				</div><!-- /.box -->
			</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</aside><!-- /.right-side -->