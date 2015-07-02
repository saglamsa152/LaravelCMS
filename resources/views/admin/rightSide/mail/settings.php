<aside class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small><?= _( 'Menage Mail Addresses' ) ?></small>
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
						<h3 class="box-title"><?= _( 'Change Password' ) ?></h3>
					</div><!-- /.box-header-->
					<div class="box-body">
						<?= Form::open( array(
							'role'   => 'form',
							'id'     => '',
							'class'  => 'form-horizontal ajaxForm',
							'method' => 'post',
							'action'=> 'AdminController@postUpdateMailUserPassword',
							'title'  => _( 'Change Password' ) ) );
						?>
						<!-- Theme Skin -->
						<div class="form-group">
							<?= Form::label( 'emailUser', _( 'Email Username' ), array( 'class' => 'control-label col-md-2' ) ) ?>
							<div class="input-group col-md-4">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<?= Form::select('emailUser',$emails,'',array( 'class' => 'form-control' ))?>
							</div><!-- /input-group -->
						</div>
						<!-- Current Password -->
						<div id="currentPassword" class="form-group">
							<?= Form::label( 'currentPassword', _( 'Current Password' ), array( 'class' => 'control-label col-md-2' ) ) ?>
							<div class="input-group col-md-4">
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
								<?= Form::password( 'currentPassword', array( 'class' => 'form-control', 'placeholder' => _( 'Current Password' ) ) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->

						<!-- New Password -->
						<div id="password" class="form-group">
							<?= Form::label( 'password', _( 'New Password' ), array( 'class' => 'control-label col-md-2' ) ) ?>
							<div class="input-group col-md-4">
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
								<?= Form::password( 'password', array( 'class' => 'form-control', 'placeholder' => _( 'New Password' ) ) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->

						<!-- Confirmation Password -->
						<div id="password_confirmation" class="form-group">
							<?= Form::label( 'password_confirmation', _( 'Password Confirmation' ), array( 'class' => 'control-label col-md-2' ) ) ?>
							<div class="input-group col-md-4">
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
								<?= Form::password( 'password_confirmation', array( 'class' => 'form-control', 'placeholder' => _( 'Password Confirmation' ) ) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
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