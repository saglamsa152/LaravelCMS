@include('admin.header')
<!-- todo laravel kitap sayfa 57 -->
<div>
	<ul class="breadcrumb">
		<li>
			<a href="{{URL::action('AdminController@getIndex')}}"><?php echo _('Home')?></a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getSlider')}}"><?php echo _('Slider')?></a>
		</li>
	</ul>
</div>

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> <?php echo _('Slides')?></h2>

			<a class="btn btn-primary pull-right" href="{{URL::action('AdminController@getAddSlide')}}">
				<i class="icon-plus icon-white"></i>
				<?php echo _('Add Slide')?>
			</a>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
				<tr>
					<th>Id</th>
					<th><?php echo _('Title')?></th>
					<th><?php echo _('İmage')?></th>
					<th><?php echo _('Description')?></th>
					<th><?php echo _('Actions')?></th>
				</tr>
				</thead>
				<tbody>

				@foreach($slides as $slide)
				<?php
				foreach($slide->postMeta as $meta){
					$slide=array_add($slide,$meta->metaKey,$meta->metaValue);
				}
				?>
				<tr>
					<td>{{$slide->id}}</td>
					<td>{{$slide->title}}</td>
					<td><img src="{{URL::asset($slide->image)}}" class="img-rounded" height="150px" /></td>
					<td class="center">{{$slide->content}}</td>
					<td class="center">
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn btn-large dropdown-toggle"><?php echo _('Actions')?> <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li>
									<a href="#">
										<i class="icon-zoom-in"></i>
										<?php echo _('View')?>
									</a>
								</li>
								<li><a href="#">
										<i class="icon-edit"></i>
										<?php echo _('Edit')?>
									</a></li>
								<li>
									<a href="<?= URL::action( 'AdminController@getDeletePost', $product->id ) ?>">
										<i class="icon-trash"></i>
										<?php echo _( 'Delete' ) ?>
									</a></li>
							</ul>
						</div>
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<!--/span-->

</div><!--/row-->
@include('admin.footer')
