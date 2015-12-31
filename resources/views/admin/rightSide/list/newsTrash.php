<aside class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small>advanced tables</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i class="fa fa-dashboard"></i> <?=_('Home')?></a></li>
			<li><a href="<?= URL::action( 'AdminController@getNews' ) ?>"><?= _( 'News' ) ?></a></li>
			<li class="active"><?= _( 'List' ) ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">

				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= _( 'News' ) ?></h3>
						<div class="box-tools">
							<button class="btn btn-success pull-right" onclick="window.location.replace('<?=URL::action('AdminController@getAddNews')?>')">
								<i class="fa fa-plus"></i> <?=_('Add New')?>
							</button>
						</div><!-- &.box-tools -->
					</div><!-- /.box-header -->
					<div class="box-body">
						<table id="news-table" class="table table-responsive table-bordered table-striped dataTable text-center">
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

							<?php foreach ( $news as $new ): ?>
								<tr>
									<td><?= $new->id ?></td>
									<td><?= $new->title ?></td>
									<td><?= $new->user->username ?></td>
									<td><?= $new->created_at ?></td>
									<td><?= $new->type ?></td>
									<td><?= $new->getHtmlStatus() ?></td>
									<td>
										<div class="btn-group text-left" style="margin-right:5px">
											<button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
												<?= _( 'Actions' ) ?>
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul role="menu" class="dropdown-menu">
												<li><!-- todo deleteform gibi geri getirmek istiyormusunuz uyarısı gelmeli -->
													<?= Form::open( array( 'id' => 'restoreForm-' . $new->id, 'method' => 'post', 'action' => 'AdminController@postRestorePost', 'class' => 'ajaxForm','title'=>_('Restore New') ) ) ?>
													<?= Form::hidden( 'id', $new->id ) ?>
													<?= Form::close() ?>
													<a href="#" onclick="$('#restoreForm-<?= $new->id ?>').submit()">
														<i class="fa fa-recycle"></i>
														<?= _( 'Restore' ) ?>
													</a>
												</li>
												<li>
													<?= Form::open( array( 'id' => 'deleteForm-' . $new->id, 'method' => 'post', 'action' => 'AdminController@postForceDeletePost', 'class' => 'ajaxFormDelete' ) ) ?>
													<?= Form::hidden( 'id', $new->id ) ?>
													<?= Form::close() ?>
													<a href="#" onclick="$('#deleteForm-<?= $new->id ?>').submit()">
														<i class="fa fa-trash-o"></i>
														<?= _( 'Delete' ) ?>
													</a>
												</li>
											</ul>
										</div>
										<?= Form::checkbox( 'bulk-' . $new->id, $new->id ) ?>
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
												<a href="#" data-link="<?= URL::action( 'AdminController@postRestorePost' ) ?>">
													<i class="fa fa-recycle"></i>
													<?= _( 'Restore' ) ?>
												</a>
											</li>
											<li>
												<a href="#" data-action="delete" data-link="<?= URL::action( 'AdminController@postForceDeletePost' ) ?>">
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
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>

	</section>
	<!-- /.content -->
</aside><!-- /.right-side -->