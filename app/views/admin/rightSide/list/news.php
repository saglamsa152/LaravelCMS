<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= _( 'News' ) ?>
			<small>advanced tables</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped dataTable">
							<thead>
							<tr>
								<th>Id</th>
								<th><?php echo _( 'Title' ) ?></th>
								<th><?php echo _( 'Author' ) ?></th>
								<th><?php echo _( 'Publish Date' ) ?></th>
								<th><?php echo _( 'Type' ) ?></th>
								<th><?php echo _( 'Actions' ) ?></th>
							</tr>
							</thead>
							<tbody>

							<?php foreach ( $news as $new ): ?>
								<tr>
									<td><?= $new->id ?></td>
									<td><?= $new->title ?></td>
									<td><?= $new->user->username ?></td>
									<td class="center"><?= $new->created_at ?></td>
									<td class="center"><?= $new->type ?></td>
									<td class="center">
										<div class="btn-group">
											<button class="btn btn-default btn-flat" type="button"><?= _( 'Actions' ) ?></button>
											<button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul role="menu" class="dropdown-menu">
												<li>
													<a href="<?= URL::action( 'HomeController@getNews', $new->url ) ?>">
														<i class="icon-zoom-in"></i>
														<?php echo _( 'View' ) ?>
													</a>
												</li>
												<li><a href="<?= URL::action( 'AdminController@getUpdateNews', $new->id ) ?>">
														<i class="icon-edit"></i>
														<?php echo _( 'Edit' ) ?>
													</a></li>
												<li>
													<a href="<?= URL::action( 'AdminController@getDeletePost', $new->id ) ?>">
														<i class="icon-trash"></i>
														<?php echo _( 'Delete' ) ?>
													</a></li>
											</ul>
										</div>
									</td>
								</tr>
							<?php endforeach ?>
							</tbody>
							<tfoot>
							<tr>
								<th>Id</th>
								<th><?php echo _( 'Title' ) ?></th>
								<th><?php echo _( 'Author' ) ?></th>
								<th><?php echo _( 'Publish Date' ) ?></th>
								<th><?php echo _( 'Type' ) ?></th>
								<th><?php echo _( 'Actions' ) ?></th>
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


