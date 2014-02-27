@include('admin.header')
<!-- todo laravel kitap sayfa 57 -->
<div>
	<ul class="breadcrumb">
		<li>
			<a href="{{URL::action('AdminController@getIndex')}}">{{_('Home')}}</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::action('AdminController@getUsers')}}">{{_('Members')}}</a>
		</li>
	</ul>
</div>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> {{_('Members')}}</h2>
			<a href="{{URL::action('AdminController@getAddUser')}}">
				<button class="btn btn-primary pull-right"><i class="icon-plus icon-white"></i> {{_('Add User')}}</button>
			</a>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
				<tr>
					<th>Id</th>
					<th>{{_('Username')}}</th>
					<th>{{_('Date registered')}}</th>
					<th>{{_('Role')}}</th>
					<th>{{_('Actions')}}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->username}}</td>
					<td class="center">{{$user->created_at}}</td>
					<td class="center">{{$user->role}}</td>
					<td class="center">
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn btn-large dropdown-toggle">{{_('Actions')}} <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li>
									<a href="{{URL::action('AdminController@getProfile',$user->id)}}">
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
