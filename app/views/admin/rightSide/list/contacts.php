<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small>advanced tables</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i class="fa fa-dashboard"></i> <?=_('Home')?></a></li>
			<li><a href="<?= URL::action( 'AdminController@getServices' ) ?>"><?= _( 'Services' ) ?></a></li>
			<li class="active"><?= _( 'List' ) ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">

				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= _( 'Services' ) ?></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped dataTable">
							<thead>
							<tr>
								<th>Id</th>
								<th><?= _('Sender\'s Name')?></th>
								<th><?= _('Sender\'s E-mail')?></th>
								<th><?= _('Send Date')?></th>
								<th><?= _('Message')?></th>
								<th><?= _('Actions')?></th>
							</tr>
							</thead>
							<tbody>

							<?php foreach ( $contacts as $contact ): ?>
								<?php $contact->meta=unserialize($contact->meta); // veritabanındaki bilgiyi diziye döndirmek için?>
								<tr>
									<td><?= $contact->id ?></td>
									<td><?= $contact->meta['name'] ?></td>
									<td><?= $contact->meta['email'] ?></td>
									<td class="center"><?= $contact->created_at ?></td>
									<td class="center"><?= $contact->message ?></td>
									<td class="center">
										<div class="btn-group">
											<button class="btn btn-default btn-flat" type="button"><?= _( 'Actions' ) ?></button>
											<button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul role="menu" class="dropdown-menu">
												<li>
													<a href="<?= URL::action('AdminController@getMarkAsReadContact',$contact->id) ?>">
														<i class="fa fa-check"></i>
														<?php if($contact->isRead): echo _('Mark as unread'); else: echo _('Mark as read'); endif;?>
													</a>
												</li>
												<li><a href="<?= URL::action( 'AdminController@getUpdateService', $contact->id ) ?>">
														<i class="fa fa-check"></i>
														<?= _( 'Answer' ) ?>
													</a></li>
												<li>
													<a href="<?= URL::action( 'AdminController@getDeletePost', $contact->id ) ?>">
														<i class="fa fa-trash-o"></i>
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
								<th><?= _('Sender\'s Name')?></th>
								<th><?= _('Sender\'s E-mail')?></th>
								<th><?= _('Send Date')?></th>
								<th><?= _('Message')?></th>
								<th><?= _('Actions')?></th>
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


