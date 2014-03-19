@include('admin.header')
<!-- todo laravel kitap sayfa 57 -->
<div>
	<ul class="breadcrumb">
		<li>
			<a href="{{URL::action('AdminController@getIndex')}}"><?php echo _('Home')?></a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getNews')}}"><?php echo _('News')?></a>
		</li>
	</ul>
</div>

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> <?php echo _('News')?></h2>

			<a class="btn btn-success pull-right" href="{{URL::action('AdminController@getAddNews')}}">
				<i class="icon-edit icon-white"></i>
				<?php echo _('Add News')?>
			</a>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
				<tr>
					<th>Id</th>
					<th><?php echo _('Title')?></th>
					<th><?php echo _('Author')?></th>
					<th><?php echo _('Publish Date')?></th>
					<th><?php echo _('Type')?></th>
					<th><?php echo _('Actions')?></th>
				</tr>
				</thead>
				<tbody>

				@foreach($news as $new)
				<tr>
					<td>{{$new->id}}</td>
					<td>{{$new->title}}</td>
					<td>{{$new->user->username}}</td>
					<td class="center">{{$new->created_at}}</td>
					<td class="center">{{$new->type}}</td>
					<td class="center">
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn btn-large dropdown-toggle"><?php echo _('Actions')?> <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li>
									<a href="{{URL::action('HomeController@getNews',$new->url)}}">
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
