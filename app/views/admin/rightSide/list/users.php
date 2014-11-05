<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small>advanced tables</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i class="fa fa-dashboard"></i> <?= _( 'Home' ) ?>
				</a></li>
			<li><a href="<?= URL::action( 'AdminController@getUsers' ) ?>"><?= _( 'Users' ) ?></a></li>
			<li class="active"><?= _( 'List' ) ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">

				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= _( 'Users' ) ?></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="users-table" class="table table-bordered table-striped dataTable">
							<thead>
							<tr>
								<th>Id</th>
								<th><?= _( 'Username' ) ?></th>
								<th><?= _( 'Name - Lastname' ) ?></th>
								<th><?= _( 'email' ) ?></th>
								<th><?= _( 'Date registered' ) ?></th>
								<th><?= _( 'Role' ) ?></th>
								<th><?= _( 'Actions' ) ?></th>
							</tr>
							</thead>
							<tbody>

							<?php foreach ( $users as $user ): ?>
								<tr>
									<td><?= $user->id ?></td>
									<td><?= $user->username ?></td>
									<td><?= $user->name . ' - ' . $user->lastName ?></td>
									<td><?= $user->email ?></td>
									<td><?= $user->created_at ?></td>
									<td><?= $user->role ?></td>
									<td>
										<div class="btn-group">
											<button class="btn btn-default btn-flat" type="button"><?= _( 'Actions' ) ?></button>
											<button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul role="menu" class="dropdown-menu">
												<li>
													<a href="<?= URL::action( 'AdminController@getProfile', $user->id ) ?>">
														<i class="fa fa-eye"></i>
														<?= _( 'View/Edit' ) ?>
													</a>
												</li>
												<li>
													<?=Form::open(array('id'=>'deleteForm-'.$user->id,'method'=>'post','action'=>'AdminController@postDeleteUser','class'=>'ajaxForm'))?>
													<?=Form::hidden('id',$user->id)?>
													<?=Form::close()?>
													<a href="#" onclick="$('#deleteForm-<?=$user->id?>').submit()">
														<i class="fa fa-trash-o"></i>
														<?=_( 'Delete' )?>
													</a>
											</ul>
										</div>
									</td>
								</tr>
							<?php endforeach ?>
							</tbody>
							<tfoot>
							<tr>
								<th>Id</th>
								<th><?= _( 'Username' ) ?></th>
								<th><?= _( 'Date registered' ) ?></th>
								<th><?= _( 'Role' ) ?></th>
								<th><?= _( 'Actions' ) ?></th>
							</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>

	</section>
	<!-- /.content -->
</aside><!-- /.right-side -->


