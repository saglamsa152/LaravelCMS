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
										<div class="btn-group" style="margin-right:5px">
											<button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
												<?= _( 'Actions' ) ?>
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
													<?= Form::open( array( 'id' => 'deleteForm-' . $user->id, 'method' => 'post', 'action' => 'AdminController@postDeleteUser', 'class' => 'ajaxForm' ) ) ?>
													<?= Form::hidden( 'id', $user->id ) ?>
													<?= Form::close() ?>
													<a href="#" onclick="$('#deleteForm-<?= $user->id ?>').submit()">
														<i class="fa fa-trash-o"></i>
														<?= _( 'Delete' ) ?>
													</a>
											</ul>
										</div>
										<?= Form::checkbox( 'deleteID-' . $user->id, $user->id ) ?>
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
								<th><?= _( 'Role' ) ?></th>
								<th>
									<div class="btn-group" style="margin-right:5px">
										<button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
											<?= _( 'Bulk Actions' ) ?>
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul role="menu" class="dropdown-menu">
											<li>
												<a id="bulkDelete" href="#" data-link="<?= URL::action( 'AdminController@postDeleteUser' ) ?>">
													<i class="fa fa-trash-o"></i>
													<?= _( 'Delete' ) ?>
												</a>
										</ul>
									</div>
									<input type="checkbox" id="check-all" />
								</th>
							</tfoot>
						</table>
					</div>
					<!-- /.box-body -->
					<script type="text/javascript">
						/*
						* toplu işlemler (Bulk Actions) Silme işlemi
						*/
						$(function () {
							$('#bulkDelete').click(function () {
								var ids = new Array();
								$("#users-table input[type='checkbox']").each(function (index, e) {
									if (!$(e).is('#check-all')) { //hepsini seçmemize yarıyan checbox ı  atlıyoruz
										if ($(e).parent().hasClass('checked')) //seçilmiş olan checkbox değerlerini ids dizisine aktarıyoruz
											ids.push(e.value)
									}
								});
								/* waiting animation */
								$('body').fadeIn('slow', function () {
									$(this).append(
											'<div id="ajaxResult" class="alert alert-info">' +
											'<div class="spinner">' +
											'<div class="rect1"></div>' +
											'<div class="rect2"></div>' +
											'<div class="rect3"></div>' +
											'<div class="rect4"></div>' +
											'<div class="rect5"></div>' +
											'</div>' +
											'</div>'
									);
								});
								$('#ajaxResult').css({
									'left': (window.innerWidth - jQuery('#ajaxResult').width()) / 2,
									'top' : (window.innerHeight - jQuery('#ajaxResult').height()) / 2
								});
								/* / waiting animation */
								$.ajax({
									type   : 'POST',
									url    : $(this).attr('data-link'),
									data   : {id: ids,'_token':$('<?=Form::token()?>').val()},
									success: function (returnData) {
										var cevap = '<ul>';
										if (jQuery.type(returnData['msg']) == "object") {
											$.each(returnData['msg'], function (key, value) {
												cevap += '<li>' + key + '-' + value + '</li>';
											});
											cevap += '</ul>';
										} else cevap = returnData['msg'];
										$('#ajaxResult').fadeOut('slow', function () {
											$(this).removeClass('alert-info').addClass(' alert-' + returnData['status'] + ' alert-dismissable');
											$(this).html(
													'<i class="fa fa-check"></i>' +
													'<button aria-hidden="true"  class="close" type="button">×</button>' +
													'' + cevap + ''
											).css({
														'left': (window.innerWidth - $(this).width()) / 2,
														'top' : (window.innerHeight - $(this).height()) / 2
													});
											// fadeout effect on click close button
											$(this).children('.close').click(function () {
												$(this).parent().fadeOut('slow', function () {
													$(this).remove()
													if (jQuery.type(returnData['redirect']) != 'undefined') {
														window.location.replace(returnData['redirect']);
													}
												});
											});
										});
										$('#ajaxResult').fadeIn('slow');
									}
								});
							});
						})
					</script>
				</div>
				<!-- /.box -->
			</div>
		</div>

	</section>
	<!-- /.content -->
</aside><!-- /.right-side -->


