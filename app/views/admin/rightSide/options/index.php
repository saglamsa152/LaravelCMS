<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small><?= _( 'Menage General Options' ) ?></small>
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
						<h3 class="box-title"><?= _( 'Site Options' ) ?></h3>

						<div class="box-tools pull-right">
							<button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-sm" data-original-title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-sm" data-original-title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<!-- /.box-header-->
					<div class="box-body">
						<?=
						Form::open( array(
								'role'   => 'form',
								'id'     => 'siteOptions',
								'class'  => 'form-horizontal ajaxForm',
								'method' => 'post',
								'action' => 'OptionsController@postSave' ) )?>
						<div class="form-group">
							<?= Form::hidden( 'type', 'general' ) ?>
							<?= Form::label( 'options[siteName]', _( 'Site Name' ), array( 'class' => 'control-label col-md-2' ) ) ?>
							<div class=" col-md-4">
								<?= Form::text( 'options[siteName]', Option::getOption('siteName'), array( 'class' => 'form-control', 'id' => 'siteName' ) ) ?>
							</div>
						</div>
						<div class="form-group">
							<?= Form::label( 'options[siteDescription]', _( 'Site Description' ), array( 'class' => 'control-label col-md-2' ) ) ?>
							<div class="col-md-4">
								<?= Form::textarea( 'options[siteDescription]', Option::getOption('siteDescription'), array( 'class' => 'form-control', 'rows' => '3' ) ) ?>
							</div>
						</div>
						<div id="sonuc"></div>
					</div>
					<!-- /.box-body-->
					<div class="box-footer clearfix">
						<?= Form::button( _( 'Save' ) . ' <i class="fa fa-arrow-circle-right"></i>', array( 'class' => 'pull-right btn btn-default', 'type' => 'submit' ) ) ?>
						<?= Form::close(); ?>
					</div>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>
	<!-- /.content -->
</aside><!-- /.right-side -->