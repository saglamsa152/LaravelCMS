@include('admin.header')
<!-- todo laravel kitap sayfa 57 -->
<div>
	<ul class="breadcrumb">
		<li>
			<a href="{{URL::action('AdminController@getIndex')}}">Home</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getUsers')}}">Members</a>
		</li>
	</ul>
</div>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> Members</h2>
			<a href="{{URL::action('AdminController@getNewNews')}}"><!--todo -->
				<button class="btn btn-primary"> Add User</button>
			</a>

			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
				<tr>
					<th>Id</th>
					<th>Username</th>
					<th>Date registered</th>
					<th>Role</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				@foreach(User::all() as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->username}}</td>
					<td class="center">{{$user->created_at}}</td>
					<td class="center">{{$user->role}}</td>
					<td class="center">
						<a class="btn btn-success" href="{{URL::action('AdminController@getProfile',$user->id)}}">
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
