<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 28.02.2014
 * Time: 00:07
 */
?>
@include('admin.header')
<div>
	<ul class="breadcrumb">
		<li>
			<a href="{{URL::action('AdminController@getIndex')}}"><?php echo _('Home')?></a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getProducts')}}"><?php echo _('Products')?></a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getUpdateProduct')}}"><?php echo _('Update Product')?></a>
		</li>
	</ul>
</div>
<?php echo Form::model($product,array(
		'role'   => 'form',
		'class'  => '',
		'method' => 'post',
		'action' => 'AdminController@postUpdatePost'
) );
echo Form::hidden( 'type', 'product' );
echo Form::hidden('id',$product->id)?>
<div class="row-fluid sortable ui-sortable">

	<div class="box span9">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> <?= _('New Product')?></h2>

		</div>
		<div class="box-content">
			@if($errors->count() >0)
			@foreach ($errors->all() as $error)
			<div class="alert alert-error">
				<button data-dismiss="alert" class="close" type="button">×</button>
				<strong><?=_('Warning');?></strong> {{$error}}
			</div>
			@endforeach
			@endif
			<fieldset>
				<div class="controls">
					<?= Form::text( 'title', Input::old( 'title' ), array( 'class' => 'span6', 'id' => 'title', 'placeholder' => _( 'Title' ) ) ) ?>
				</div>

				<div class="control-group">
					<div class="controls">
						<?php echo Form::textarea( 'content', Input::old( 'content' ), array( 'class' => 'ckeditor', 'id' => 'content' ) ) ?>
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
				<?php echo Form::submit( _( 'Update' ), array( 'class' => 'btn btn-primary' ) ) ?>
			</div>
		</div>
	</div>
	<div class="box span3">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> <?php echo _('Product Meta')?></h2>

			<div class="box-icon">
				<a class="btn  btn-round" href="#"><i class="icon-cog"></i></a>
				<a class="btn btn-minimize btn-round" href="#"><i class="icon-chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="control-group">
				<label class="control-label" for="file_upload"><?php echo _('Pruduct Category')?></label>

				<div class="controls">
					<?=Form::select('postMeta[category]',array('kategori 1'=>'kategori 1','Kategori 2'=>'Kategori 2'),$product->category)?>

				</div>
				<?= Form::label('price',_('Price'))?>
				<?= Form::text('postMeta[price]',$product->price)?>
			</div>
		</div>
	</div>

<?php ?>
</div><!--/row-->
<?php echo Form::close() ?>
@include('admin.footer')
