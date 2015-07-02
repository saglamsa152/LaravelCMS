<aside class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small>advanced tables</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i class="fa fa-dashboard"></i> <?=_('Home')?></a></li>
			<li><a href="<?= URL::action( 'AdminController@getProducts' ) ?>"><?= _( 'Products' ) ?></a></li>
			<li class="active"><?= _( 'List' ) ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">

				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= _( 'Products' ) ?></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped dataTable">
							<thead>
							<tr>
								<th>Id</th>
								<th><?= _( 'Title' ) ?></th>
								<th><?= _( 'Author' ) ?></th>
								<th><?= _( 'Publish Date' ) ?></th>
								<th><?= _( 'Type' ) ?></th>
								<th><?= _( 'Actions' ) ?></th>
							</tr>
							</thead>
							<tbody>

							<?php foreach ( $products as $product ): ?>
								<tr>
									<td><?= $product->id ?></td>
									<td><?= $product->title ?></td>
									<td><?= $product->user->username ?></td>
									<td class="center"><?= $product->created_at ?></td>
									<td class="center"><?= $product->type ?></td>
									<td class="center">
										<div class="btn-group">
											<button class="btn btn-default btn-flat" type="button"><?= _( 'Actions' ) ?></button>
											<button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul role="menu" class="dropdown-menu">
												<li>
													<a href="<?= URL::action( 'HomeController@getProducts', $product->url ) ?>">
														<i class="fa fa-eye"></i>
														<?= _( 'View' ) ?>
													</a>
												</li>
												<li><a href="<?= URL::action( 'AdminController@getUpdateProduct', $product->id ) ?>">
														<i class="fa fa-edit"></i>
														<?= _( 'Edit' ) ?>
													</a></li>
												<li>
													<a href="#">
														<i class="fa fa-trash"></i>
														<?= _( 'Delete' ) ?>
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
								<th><?= _( 'Title' ) ?></th>
								<th><?= _( 'Author' ) ?></th>
								<th><?= _( 'Publish Date' ) ?></th>
								<th><?= _( 'Type' ) ?></th>
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


