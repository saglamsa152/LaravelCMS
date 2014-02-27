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
			<a href="{{URL::action('AdminController@getIndex')}}">{{_('Home')}}</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getNews')}}">{{_('News')}}</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getAddNews')}}">{{_('New News')}}</a>
		</li>
	</ul>
</div>
<?php echo Form::open( array(
		'role'   => 'form',
		'class'  => '',
		'method' => 'post',
		'action' => 'AdminController@postAddPost'
) );
echo Form::hidden( 'type', 'news' )?>
<div class="row-fluid sortable ui-sortable">

	<div class="box span9">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> {{_('New News')}}</h2>

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
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> {{_('News Meta')}}</h2>

			<div class="box-icon">
				<a class="btn  btn-round" href="#"><i class="icon-cog"></i></a>
				<a class="btn btn-minimize btn-round" href="#"><i class="icon-chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<?php echo Form::submit( _( 'Publish' ), array( 'class' => 'btn btn-primary' ) ) ?>
		</div>
	</div>
	<div class="box span3">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> {{_('News Meta')}}</h2>

			<div class="box-icon">
				<a class="btn  btn-round" href="#"><i class="icon-cog"></i></a>
				<a class="btn btn-minimize btn-round" href="#"><i class="icon-chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="control-group">
				<label class="control-label" for="file_upload">{{_('File input')}}</label>

				<div class="controls">
					<input class="input-file uniform_on" id="file_upload" type="file">
				</div>
			</div>
		</div>
	</div>

</div><!--/row-->
<?php echo Form::close() ?>
@include('admin.footer')
