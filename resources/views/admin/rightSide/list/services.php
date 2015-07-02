<aside class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small><?=_('Manage Workspaces')?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i class="fa fa-dashboard"></i> <?=_('Home')?></a></li>
			<li><a href="<?= URL::action( 'AdminController@getService' ) ?>"><?= _('My Workspace') ?></a></li>
			<li class="active"><?= _( 'List' ) ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">

				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= _('My Workspace') ?></h3>
						<div class="box-tools">
							<button class="btn btn-success pull-right" onclick="window.location.replace('<?=URL::action('AdminController@getAddService')?>')">
								<i class="fa fa-plus"></i> <?=_('Add New')?>
							</button>
						</div><!-- &.box-tools -->
					</div><!-- /.box-header -->
					<div class="box-body">
						<table id="services-table" class="table table-responsive table-bordered table-striped dataTable text-center">
							<thead>
							<tr>
								<th>Id</th>
								<th><?= _( 'Title' ) ?></th>
								<th><?= _( 'Author' ) ?></th>
								<th><?= _( 'Publish Date' ) ?></th>
								<th><?= _( 'Type' ) ?></th>
								<th><?= _( 'Status' ) ?></th>
								<th><?= _( 'Actions' ) ?></th>
							</tr>
							</thead>
							<tbody>

							<?php foreach ( $services as $service ): ?>
								<tr>
									<td><?= $service->id ?></td>
									<td><?= $service->title ?></td>
									<td><?= $service->user->username ?></td>
									<td><?= $service->created_at ?></td>
									<td><?= $service->type ?></td>
									<td><?= $service->getHtmlStatus() ?></td>
									<td>
										<div class="btn-group text-left" style="margin-right:5px">
											<button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
												<?= _( 'Actions' ) ?>
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul role="menu" class="dropdown-menu">
												<li>
													<a href="<?= URL::action( 'HomeController@getServices', $service->url ) ?>">
														<i class="fa fa-eye"></i>
														<?= _( 'View' ) ?>
													</a>
												</li>
												<li>
													<a href="<?= URL::action( 'AdminController@getUpdateService', $service->id ) ?>">
														<i class="fa fa-edit"></i>
														<?= _( 'Edit' ) ?>
													</a>
												</li>
												<li>
													<?= Form::open( array( 'id' => 'publishForm-' . $service->id, 'method' => 'post', 'action' => 'AdminController@postTogglePostStatus', 'class' => 'ajaxForm','title'=>_('Change Status') ) ) ?>
													<?= Form::hidden( 'id', $service->id ) ?>
													<?= Form::close() ?>
													<a href="#" onclick="$('#publishForm-<?= $service->id ?>').submit()">
														<i class="fa fa-check"></i>
														<?php if($service->status=='publish') echo _('Make Task'); else echo _( 'Publish' ) ?>
													</a>
												</li>
												<li>
													<?= Form::open( array( 'id' => 'deleteForm-' . $service->id, 'method' => 'post', 'action' => 'AdminController@postDeletePost', 'class' => 'ajaxFormDelete' ) ) ?>
													<?= Form::hidden( 'id', $service->id ) ?>
													<?= Form::close() ?>
													<a href="#" onclick="$('#deleteForm-<?= $service->id ?>').submit()">
														<i class="fa fa-trash-o"></i>
														<?= _( 'Delete' ) ?>
													</a>
												</li>
											</ul>
										</div>
										<?= Form::checkbox( 'bulk-' . $service->id, $service->id ) ?>
									</td>
								</tr>
							<?php endforeach ?>
							</tbody>
							<tfoot>
							<tr>
								<th>Id</th>
								<th><?= _( 'Title' ) ?></th>
								<th><?= _( 'Author' ) ?></th>
								<th><?= _( 'Publish Date' ) ?></th>
								<th><?= _( 'Type' ) ?></th>
								<th><?= _( 'Status' ) ?></th>
								<th><div id="bulkAction" class="btn-group text-left" style="margin-right:5px">
										<?=Form::token()?>
										<button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
											<?= _( 'Bulk Actions' ) ?>
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul role="menu" class="dropdown-menu">
											<li>
												<a href="#" data-link="<?= URL::action( 'AdminController@postTogglePostStatus' ) ?>">
													<i class="fa fa-check"></i>
													<?= _( 'Toggle Status' ) ?>
												</a>
											</li>
											<li>
												<a href="#" data-action="delete" data-link="<?= URL::action( 'AdminController@postDeletePost' ) ?>">
													<i class="fa fa-trash-o"></i>
													<?= _( 'Delete' ) ?>
												</a>
											</li>
										</ul>
									</div>
									<input type="checkbox" id="check-all" /></th>
							</tr>
							</tfoot>
						</table>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div><!-- /.col-xs-12 -->
		</div><!-- /.row -->

	</section><!-- /.content -->
</aside><!-- /.right-side -->