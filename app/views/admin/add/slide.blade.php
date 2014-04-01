<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 17.02.2014
 * Time: 00:29
 */
?>
@include('admin.header')
<div>
	<ul class="breadcrumb">
		<li>
			<a href="{{URL::action('AdminController@getIndex')}}"><?php echo _( 'Home' ) ?></a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getNews')}}"><?php echo _( 'Slider' ) ?></a>
			<span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getAddNews')}}"><?php echo _( 'New Slide' ) ?></a>
		</li>
	</ul>
</div>
<?php echo Form::open( array(
		'role'   => 'form',
		'class'  => '',
		'method' => 'post',
		'action' => 'AdminController@postAddPost'
) );
echo Form::hidden( 'type', 'slider' )?>
<div class="row-fluid sortable ui-sortable">

	<div class="box span9">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> <?php echo _( 'New Slide' ) ?></h2>

		</div>
		<div class="box-content">
			@if($errors->count() >0)
			@foreach ($errors->all() as $error)
			<div class="alert alert-error">
				<button data-dismiss="alert" class="close" type="button">×</button>
				<strong>Dikkat</strong> {{$error}}
			</div>
			@endforeach
			@endif
			<fieldset>
				<div class="controls">
					<?php echo Form::text( 'title', Input::old( 'title' ), array( 'class' => 'span6', 'id' => 'title', 'placeholder' => _( 'Title' ) ) ) ?>
				</div>

				<div class="control-group">
					<div class="controls">
						<?php echo Form::textarea( 'content', '', array( 'class' => 'ckeditor', 'id' => 'content' ) ) ?>
					</div>
				</div>
			</fieldset>

		</div>
	</div>
	<!--/span-->
	<div class="box span3">
		<div class="box-content">
			<div class="row-fluid">
				<?=
				Form::select(
						'status',
						array(
								'task'    => _( 'Task' ),
								'trash=>' => _( 'Trash' ),
								'public'  => _( 'Public' )
						),
						'public',
						array( 'class' => 'input-small' )
				) ?>
			</div>
			<div class="row-fluid">
				<?php echo Form::submit( _( 'Publish' ), array( 'class' => 'btn btn-primary' ) ) ?>
			</div>
		</div>
	</div>
	<div class="box span3">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> <?php echo _( 'News Meta' ) ?></h2>

			<div class="box-icon">
				<a class="btn  btn-round" href="#"><i class="icon-cog"></i></a>
				<a class="btn btn-minimize btn-round" href="#"><i class="icon-chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="control-group">
				<label class="control-label" for="file_upload"><?php echo _( 'File input' ) ?></label>

				<div class="controls">
					<a class="btn btn-success" data-toggle="modal" href="#uploadModal" data-target="#uploadModal">click me</a>
				</div>
			</div>
		</div>
	</div>

</div><!--/row-->

<?php echo Form::close() ?>
<div class="modal hide fade" id="uploadModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3><?php echo _( 'Settings' ) ?></h3>
	</div>
	<div class="modal-body">
		<?php echo Form::open( array(
				'role'    => 'form',
				'method'  => 'post',
				'action'  => 'AdminController@postMiniAjaxUpload',
				'id'      => 'upload',
				'enctype' => 'multipart/form-data'

		) )?>

		<div id="drop">
			Drop Here

			<a>Browse</a>
			<?php echo Form::file('upl',array('multiple'))?>
		</div>

		<ul>
			<!-- The file uploads will be shown here -->
		</ul>

		<?php echo Form::close()?>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal"><?php echo _( 'Close' ) ?></a>
		<a href="#" class="btn btn-primary"><?php echo _( 'Save changes' ) ?></a>
	</div>
</div>
@include('admin.footer')
