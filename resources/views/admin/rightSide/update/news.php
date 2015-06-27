<aside class="right-side" xmlns="http://www.w3.org/1999/html">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small><?= _( 'Update News' ) ?></small>
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
		<?=
		Form::open( array(
			'role'   => 'form',
			'id'     => 'updateNewsForm',
			'class'  => 'ajaxForm',
			'method' => 'post',
			'action' => 'AdminController@postUpdatePost'
		) ) ?>
		<?= Form::hidden( 'type', $news->type ) ?>
		<?= Form::hidden( 'id', $news->id ) ?>
		<?= Form::hidden( 'postMeta[coverImage]', $news->coverImage ) ?>
		<section class=" col-md-9">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title"><?= _( 'Update News' ) ?></h3>
				</div><!-- /.box-header-->
				<div class="box-body">
					<div class="form-group">
						<?= Form::text( 'title', $news->title, array( 'class' => 'form-control', 'id' => 'title', 'placeholder' => _( 'Title' ) ) ) ?>
					</div>
					<div class="form-group">
						<?= Form::textarea( 'content', $news->content, array( 'class' => 'ckeditor form-control', 'id' => 'content' ) ) ?>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</section>
		<section class=" col-md-3 no-padding">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						<?= Form::select( 'status', array( 'task' => _( 'Task' ), 'publish' => _( 'Publish' ) ), $news->status, array( 'class' => 'form-control' ) ) ?>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer clearfix">
					<?= Form::submit( _( 'Update' ), array( 'class' => 'btn btn-primary pull-right' ) ) ?>
				</div><!-- /.box-footer -->
			</div><!-- /.box -->
		</section>
		<?= Form::close() ?><!--/ Update News Form -->
		<!-- İmage upload -->
		<section class="col-md-3 no-padding">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs pull-right">
					<li class="active"><a data-toggle="tab" href="#view-tab"><?= _( 'View' ) ?></a></li>
					<li><a data-toggle="tab" href="#upload-tab"><i class="fa fa-cloud-upload"></i> <?= _( 'Upload' ) ?> </a>
					</li>
					<li class="pull-left header"><?= _( 'Image' ) ?></li>
				</ul>
				<div class="tab-content">
					<div id="view-tab" class="tab-pane active">
						<?= Html::image( $news->coverImage, 'News Image', array( 'class' => 'center-block', 'width' => '150px' ) );//todo haber resmi gösterilecek ?>
						<button id="clear" type="button" class="btn btn-danger pull-right" targetFormElement='#updateNewsForm input[name="postMeta[coverImage]"]'><?= _( 'Clear' ) ?></button>
						<div class="clearfix"></div>
					</div><!-- /#view .tab-pane -->
					<div id="upload-tab" class="tab-pane">
						<?= Form::open( array(
							'role'       => 'form',
							'id'         => 'upload',
							'action'     => 'AdminController@postUpload',
							'method'     => 'post',
							'enctype'    => 'multipart/form-data',
							'uploadPath' => '/assets/uploads/images/',
							'targetFormElement'=>'#updateNewsForm input[name="postMeta[coverImage]"]'
						) ) ?>
						<?= Form::hidden( 'uploadPath', public_path() . '/assets/uploads/images/' ) ?>
						<div id="drop">
							<?= _( 'Drop Here' ) ?>
							<a><?= _( 'Browse' ) ?></a>
							<input type="file" name="upl" />
						</div>
						<ul>
							<!-- The file uploads will be shown here -->
						</ul>
						<?= Form::close() ?>
					</div><!-- /#upload .tab-pane -->
				</div><!-- /.tab-content -->
			</div><!-- /.nav-tabs-custom -->
		</section>
	</section>

	<!-- /.content -->
</aside><!-- /.right-side -->