<aside class="right-side" xmlns="http://www.w3.org/1999/html">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small><?= _( 'Creat New News' ) ?></small>
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
			<?=
			Form::open( array(
					'role'   => 'form',
					'class'  => 'ajaxForm',
					'method' => 'post',
					'action' => 'AdminController@postAddPost'
			) )?>
			<?= Form::hidden( 'type', 'news' ) ?>
			<section class=" col-md-9">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= _( 'New News' ) ?></h3>

					</div>
					<!-- /.box-header-->
					<div class="box-body">
						<div class="form-group">
							<?= Form::text( 'title', Input::old( 'title' ), array( 'class' => 'form-control', 'id' => 'title', 'placeholder' => _( 'Title' ) ) ) ?>
						</div>
						<div class="form-group">
							<?= Form::textarea( 'content', Input::old('content'), array( 'class' => 'ckeditor form-control', 'id' => 'content' ) ) ?>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</section>
			<section class=" col-md-3">
				<div class="box">
					<div class="box-body">
						<div class="form-group">
						<?=
						Form::select(
								'status',
								array(
										'task'    => _( 'Task' ),
										'publish'  => _( 'Publish' )
								),
								'publish',
								array( 'class' => 'form-control' )
						) ?>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer clearfix">
						<?= Form::submit( _( 'Publish' ), array( 'class' => 'btn btn-primary pull-right' ) ) ?>
					</div>
					<!-- /.box-footer -->
				</div>
				<!-- /.box -->
			</section>
			<?= Form::close() ?>
		</div>
	</section>

	<!-- /.content -->
</aside><!-- /.right-side -->