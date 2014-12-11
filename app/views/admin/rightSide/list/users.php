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
			<li><a href="<?= URL::action( 'AdminController@getUsers' ) ?>"><?= _( 'Members' ) ?></a></li>
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
						<div class="box-tools">
							<button class="btn btn-success pull-right" onclick="window.location.replace('<?=URL::action('AdminController@getAddUser')?>')">
								<i class="fa fa-plus"></i> <?=_('Add New')?>
							</button>
						</div><!-- &.box-tools -->
					</div><!-- /.box-header -->
					<div class="box-body">
						<table id="users-table" class="table table-responsive table-bordered table-striped dataTable text-center">
							<thead>
							<tr>
								<th>Id</th>
								<th><?= _( 'Username' ) ?></th>
								<th><?= _( 'Name - Lastname' ) ?></th>
								<th><?= _( 'email' ) ?></th>
								<th><?= _( 'Date registered' ) ?></th>
								<th ><?= _( 'Status' ) ?></th>
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
									<td><?= $user->getHtmlStatus() ?></td>
									<td>
										<div class="btn-group text-left" style="margin-right:5px">
											<button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
												<?= _( 'Actions' ) ?>
												<span class="caret"></span>
												<span class="sr-only"><?=_('Toggle Dropdown')?></span>
											</button>
											<ul role="menu" class="dropdown-menu">
												<li>
													<a href="<?= URL::action( 'AdminController@getProfile', $user->id ) ?>">
														<i class="fa fa-eye"></i>
														<?= _( 'View/Edit' ) ?>
													</a>
												</li>
												<li>
													<?= Form::open( array( 'id' => 'approveForm-' . $user->id, 'method' => 'post', 'action' => 'AdminController@postApproveUser', 'class' => 'ajaxForm','title'=>_('Approve User') ) ) ?>
													<?= Form::hidden( 'id', $user->id ) ?>
													<?= Form::close() ?>
													<a href="#" onclick="$('#approveForm-<?= $user->id ?>').submit()">
														<i class="fa fa-check"></i>
														<?php if ($user->role=='unapproved') echo  _( 'Approve' );else echo _( 'Unapprove' ); ?>
													</a>
												</li>
												<?php if ( userCan( 'deleteUser' ) ): ?>
												<li>
													<?= Form::open( array( 'id' => 'deleteForm-' . $user->id, 'method' => 'post', 'action' => 'AdminController@postDeleteUser', 'class' => 'ajaxFormDelete' ) ) ?>
													<?= Form::hidden( 'id', $user->id ) ?>
													<?= Form::close() ?>
													<a href="#" onclick="$('#deleteForm-<?= $user->id ?>').submit()">
														<i class="fa fa-trash-o"></i>
														<?= _( 'Delete' ) ?>
													</a>
												</li>
												<?php endif ?>
											</ul>
										</div>
										<?= Form::checkbox( 'bulk-' . $user->id, $user->id ) ?>
									</td>
								</tr>
							<?php endforeach ?>
							</tbody>
							<tfoot>
							<tr>
								<th>Id</th>
								<th><?= _( 'Username' ) ?></th>
								<th><?= _( 'Name - Lastname' ) ?></th>
								<th><?= _( 'email' ) ?></th>
								<th><?= _( 'Date registered' ) ?></th>
								<th><?= _( 'Status' ) ?></th>
								<th>
									<div id="bulkAction" class="btn-group text-left" style="margin-right:5px">
										<?=Form::token()?>
										<button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
											<?= _( 'Bulk Actions' ) ?>
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul role="menu" class="dropdown-menu">
											<?php if(userCan('deleteUser')) :?>
											<li>
												<a href="#" data-action="delete" data-link="<?= URL::action( 'AdminController@postDeleteUser' ) ?>">
													<i class="fa fa-trash-o"></i>
													<?= _( 'Delete' ) ?>
												</a>
											</li>
											<?php endif ?>
											<li>
												<a href="#" data-link="<?= URL::action( 'AdminController@postApproveUser' ) ?>" data-toggle="tooltip" data-placement="bottom" title="<?= _( 'Warning! Bu işlem seçilen kullanıcılar arasındaki onaylı kullanıcıları onaysız,onaysız kullanıcıları onaylı  duruma getirir. ' ) ?>">
													<i class="fa fa-check"></i>
													<?= _( 'Approve / Unapprove' ) ?>
												</a>
											</li>
										</ul>
									</div>
									<input type="checkbox" id="check-all" />
								</th>
							</tr>
							</tfoot>
						</table>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
		</div>

	</section>
	<!-- /.content -->
</aside><!-- /.right-side -->