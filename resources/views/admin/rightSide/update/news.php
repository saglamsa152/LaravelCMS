<aside class="content-wrapper" xmlns="http://www.w3.org/1999/html">
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
		<?= Form::hidden( 'postMeta[coverImage]', $news->coverImage,array('id'=>'coverImage') ) ?>
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
			<!-- Cover İmage upload -->
			<div class="box">
				<div class="box-header">
					<h3 class="box-title"><?=_('Cover Image')?></h3>
				</div>
				<div class="box-body">
					<?php
					echo HTML::image($news->coverImage, 'News Image', array('class' => 'center-block', 'width' => '150px','id'=>'newsCoverImage'));

					fileManager()->getOpenButton(array('fldr' => 'Posts', 'type' => 1, 'btn_title' => _('Select'), 'field_id' => 'coverImage', 'targetImageId' =>'newsCoverImage'));
					?>
				</div>
			</div>
		</section>
		<?= Form::close() ?><!--/ Update News Form -->
		<div class="clearfix"></div>
	</section>

	<!-- /.content -->
</aside><!-- /.right-side -->