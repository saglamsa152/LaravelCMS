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
			<a href="{{URL::action('AdminController@getIndex')}}">Home</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getNews')}}">Posts</a>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getNewNews')}}">New Post</a>
		</li>
	</ul>
</div>
<?php echo Form::open( array(
		'role'   => 'form',
		'class'  => '',
		'method' => 'post',
		'action' => 'AdminController@postAddNews'
) )?>
<div class="row-fluid sortable ui-sortable">

	<div class="box span9">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> New News</h2>

		</div>
		<div class="box-content">

			<fieldset>
				<div class="controls">
					<?php echo Form::text( 'title', Input::old( 'title' ), array( 'class' => 'span6', 'id' => 'title', 'placeholder' => 'Title' ) ) ?>
				</div>

				<div class="control-group">
					<div class="controls">
						<textarea class="ckeditor" id="textarea2" rows="3"></textarea>
					</div>
				</div>
			</fieldset>

		</div>
	</div>
	<!--/span-->
	<div class="box span3">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> News Meta</h2>

			<div class="box-icon">
				<a class="btn  btn-round" href="#"><i class="icon-cog"></i></a>
				<a class="btn btn-minimize btn-round" href="#"><i class="icon-chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<button type="submit" class="btn btn-primary">Save changes</button>
			<button type="reset" class="btn">Cancel</button>
		</div>
	</div>
	<div class="box span3">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> News Meta</h2>

			<div class="box-icon">
				<a class="btn  btn-round" href="#"><i class="icon-cog"></i></a>
				<a class="btn btn-minimize btn-round" href="#"><i class="icon-chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="control-group">
				<label class="control-label" for="file_upload">File input</label>

				<div class="controls">
					<input class="input-file uniform_on" id="file_upload" type="file">
				</div>
			</div>
		</div>
	</div>

</div><!--/row-->
<?php echo Form::close() ?>
@include('admin.footer')
