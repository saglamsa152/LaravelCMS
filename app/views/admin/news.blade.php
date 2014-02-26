@include('admin.header')
<!-- todo laravel kitap sayfa 57 -->
<div>
	<ul class="breadcrumb">
		<li>
			<a href="{{URL::action('AdminController@getIndex')}}">{{_('Home')}}</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getNews')}}">{{_('News')}}</a>
		</li>
	</ul>
</div>

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> {{_('News')}}</h2>

			<a class="btn btn-success pull-right" href="{{URL::action('AdminController@getNewNews')}}">
				<i class="icon-edit icon-white"></i>
				{{_('Add News')}}
			</a>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
				<tr>
					<th>Id</th>
					<th>{{_('Title')}}</th>
					<th>{{_('Author')}}</th>
					<th>{{_('Publish Date')}}</th>
					<th>{{_('Type')}}</th>
					<th>{{_('Actions')}}</th>
				</tr>
				</thead>
				<tbody>

				@foreach($news as $new)
				<tr>
					<td>{{$new->id}}</td>
					<td>{{$new->title}}</td>
					<td>{{$new->author}}</td>
					<td class="center">{{$new->created_at}}</td>
					<td class="center">{{$new->type}}</td>
					<td class="center">
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn btn-large dropdown-toggle">{{_('Actions')}} <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li>
									<a href="{{URL::action('HomeController@getNews',$new->url)}}">
										<i class="icon-zoom-in"></i>
										{{_('View')}}
									</a>
								</li>
								<li><a href="#">
										<i class="icon-edit"></i>
										{{_('Edit')}}
									</a></li>
								<li>
									<a href="#">
										<i class="icon-trash"></i>
										{{_('Delete')}}
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
