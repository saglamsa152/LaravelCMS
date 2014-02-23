@include('admin.header')
<div class="row-fluid sortable ui-sortable">
	<div class="box span12" style="">
		<div data-original-title="" class="box-header well">
			<h2><i class="icon-th"></i> {{$user->username}}</h2>

			<div class="box-icon">
				<a class="btn  btn-round" href="#"><i class="icon-cog"></i></a>
				<a class="btn btn-minimize btn-round" href="#"><i class="icon-chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="row-fluid">
				{{Form::model($user,array('class'=>'form-horizontal'))}}
				<fieldset>
					<legend>{{$user->username}}</legend>
					<div class="control-group">
						{{Form::label('name','Name',array('class'=>'control-label'))}}
						<div class="controls">
							{{Form::text('name',$user->name,array('class'=>'input-medium'))}}
						</div>
					</div>
				</fieldset>
				{{Form::close()}}
			</div>
		</div>
	</div>
	<!--/span-->
</div>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> {{$user->username}}'s Posts</h2>
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

				@foreach($user->post as $post)
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
	@include('admin.footer')