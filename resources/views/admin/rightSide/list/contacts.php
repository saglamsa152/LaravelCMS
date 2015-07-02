<aside class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small>advanced tables</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i class="fa fa-dashboard"></i> <?=_('Home')?></a></li>
			<li><a href="<?= URL::action( 'AdminController@getServices' ) ?>"><?= _( 'Contact' ) ?></a></li>
			<li class="active"><?= _( 'Inbox' ) ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= _( 'Inbox' ) ?></h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<table id="inbox-table" class="table table-bordered dataTable text-center">
							<thead>
								<tr>
									<th>Id</th>
									<th><?= _( 'Sender\'s Name' ) ?></th>
									<th><?= _( 'Sender\'s E-mail' ) ?></th>
									<th><?= _( 'Send Date' ) ?></th>
									<th><?= _( 'Message' ) ?></th>
									<th><?= _( 'Actions' ) ?></th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ( $contacts as $contact ): ?>
								<?php $contact->meta=unserialize($contact->meta); // veritabanındaki bilgiyi diziye döndirmek için?>
								<tr class="<?php if(!$contact->isRead): echo 'info';endif?>">
									<td><?= $contact->id ?></td>
									<td><?= $contact->meta['name'] ?></td>
									<td><?= $contact->meta['email'] ?></td>
									<td><?= $contact->created_at ?></td>
									<td>
										<div class="message" data-toggle="tooltip" data-placement="bottom" title="<?= _( 'Click to read more' ) ?>" data-value='{"id":"<?= $contact->id ?>","name":"<?= $contact->meta['name'] ?>","content":"<?= $contact->message ?>"}'><?= mb_substr( $contact->message, 0, 450, 'UTF-8' ) ?></div>
									</td>
									<td>
										<div class="btn-group">
											<button class="btn btn-default btn-flat" type="button"><?= _( 'Actions' ) ?></button>
											<button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul role="menu" class="dropdown-menu">
												<li>
													<?php if($contact->isRead): $title=_('Mark as unread'); else: $title= _('Mark as read'); endif;?>
													<?= Form::open( array(
																	'action' => 'AdminController@postMarkAsReadContact',
																	'id'     => 'toogleStatus-' . $contact->id,
																	'class'  => 'ajaxForm',
																	'title'  => $title )
													) ?>
													<?=Form::hidden('id',$contact->id)?>
													<?=Form::close()?>
													<a href="#" onclick="$('#toogleStatus-<?=$contact->id?>').submit()" title="<?=$title?>">
														<i class="fa fa-check"></i>
														<?=$title?>
													</a>
												</li>
												<li>
													<a href="#" id="contactAnswer-<?=$contact->id?>" class="contactAnswer" data-link="<?=URL::action('AdminController@postAnswerContact')?>" data-value='<?=$contact?>'>
														<?=Form::token()?>
														<i class="fa fa-check"></i>
														<?= _( 'Answer' ) ?>
													</a>
												</li>
												<li>
													<?= Form::open( array(
																	'action' => 'AdminController@postDeleteContact',
																	'id'     => 'deleteContact-' . $contact->id,
																	'class'  => 'ajaxFormDelete',
																	'title'  => _('Delete Message') )
													) ?>
													<?=Form::hidden('id',$contact->id)?>
													<?=Form::close()?>
													<a href="#" onclick="$('#deleteContact-<?=$contact->id?>').submit()">
														<i class="fa fa-trash-o"></i>
														<?= _( 'Delete' ) ?>
													</a></li>
											</ul>
										</div>
										<?= Form::checkbox( 'bulk-' . $contact->id, $contact->id ) ?>
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
								<th>
									<div id="bulkAction" class="btn-group text-left" style="margin-right:5px">
										<?=Form::token()?>
										<button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
											<?= _( 'Bulk Actions' ) ?>
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul role="menu" class="dropdown-menu">
											<li>
												<a href="#" data-action="delete" data-link="<?= URL::action( 'AdminController@postDeleteContact' ) ?>">
													<i class="fa fa-trash-o"></i>
													<?= _( 'Delete' ) ?>
												</a>
											</li>
											<li>
												<a href="#" data-link="<?= URL::action( 'AdminController@postMarkAsReadContact' ) ?>">
													<i class="fa fa-check"></i>
													<?php if ( @$contact->isRead ): echo _( 'Mark as unread' );else: echo _( 'Mark as read' ); endif; ?>
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
	</section><!-- /.content -->
</aside><!-- /.right-side -->


