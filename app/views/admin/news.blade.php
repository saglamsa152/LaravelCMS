@include('admin.header')
<!-- todo laravel kitap sayfa 57 -->
<div>
	<ul class="breadcrumb">
		<li>
			<a href="{{URL::action('AdminController@getIndex')}}">Home</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getNews')}}">Posts</a>
		</li>
	</ul>
</div>

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> News</h2>

			<a class="btn btn-success pull-right" href="{{URL::action('AdminController@getNewNews')}}">
				<i class="icon-edit icon-white"></i>
				Add News
			</a>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Author</th>
					<th>Publish Date</th>
					<th>Type</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				@foreach(Post::all() as $post)
				<tr>
					<td>{{$post->id}}</td>
					<td>{{$post->title}}</td>
					<td>{{$post->author}}</td>
					<td class="center">{{$post->created_at}}</td>
					<td class="center">{{$post->type}}</td>
					<td class="center">
						<a class="btn btn-success" href="{{URL::action('HomeController@getNews',$post->url)}}">
							<i class="icon-zoom-in icon-white"></i>
							View
						</a>
						<a class="btn btn-info" href="#">
							<i class="icon-edit icon-white"></i>
							Edit
						</a>
						<a class="btn btn-danger" href="#">
							<i class="icon-trash icon-white"></i>
							Delete
						</a>
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
