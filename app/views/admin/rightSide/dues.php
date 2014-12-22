<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small><?= _( 'Menage Dues' ) ?></small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?= URL::action( 'AdminController@getIndex' ) ?>">
					<i class="fa fa-dashboard"></i> <?= _( 'Home' ) ?>
				</a>
			</li>
			<li class="active"><?= _( 'Dues page' ) ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="box box-info">
			<div class="box-header">
				<h4 class="box-title"><?= isset( $user ) ? $user->getScreenName() : _( 'Dues' ) ?></h4>

				<div class="box-tools pull-right">
					<?= Form::open( array(
							'class'  => 'search-form form-inline',
							'id'     => 'title-form',
							'method' => 'get',
							'action' => 'AdminController@getDues' ) ) ?>
					<div class="form-group form-group-sm ">
						<?= Form::select( 'column', array( 'username' => _( 'User Name' ), 'email' => _( 'E-mail' ), 'id' => 'ID' ), 'username', array( 'class' => 'form-control column' ) ) ?>
					</div>
					<div class="form-group form-group-sm ">
						<div class="input-group input-group-sm">
							<?= Form::text( 'value', '', array( 'class' => 'form-control input-sm typeahead', 'placeholder' => _( 'Search' ) ) ) ?>
							<div class="input-group-btn">
								<?= Form::button( '<i class="fa fa-search"></i>', array( 'class' => 'btn btn-info', 'type' => 'submit' ) ) ?>
							</div><!-- /.input-group-btn -->
						</div><!-- /input-group -->
					</div>
					<?= Form::close() ?>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body clearfix">
				<?php if ($error = $errors->getMessages()): ?>
				<div class="error-page error-page-without-headline">
					<div class="error-content text-center">
						<h3><i class="fa fa-warning text-yellow"></i><?= $error['title'][0] ?> </h3>

						<p><?= $error['content'][0] ?></p>
						<?= Form::open( array(
								'class'  => 'search-form form-inline',
								'id'     => 'content-form',
								'method' => 'get',
								'action' => 'AdminController@getDues'
						) ) ?>
						<div class="form-group">
							<?= Form::select( 'column', array( 'username' => _( 'User Name' ), 'email' => _( 'E-mail' ), 'id' => 'ID' ), 'username', array( 'class' => 'form-control column' ) ) ?>
						</div>
						<div class="form-group">
							<div class="input-group">
								<?= Form::text( 'value', '', array( 'class' => 'form-control typeahead', 'placeholder' => _( 'Search' ) ) ) ?>
								<div class="input-group-btn">
									<?= Form::button( '<i class="fa fa-search"></i>', array( 'class' => 'btn btn-info','type'=>'submit' ) ) ?>
								</div><!-- /.input-group-btn -->
							</div>
							<?= Form::close() ?>
						</div><!-- /.error-content .text-center -->
					</div><!-- /.error-page .error-page-without-headline -->
					<?php else: ?>
						<section class="col-md-3">
							<?= HTML::image( $user->getAvatarUrl( 150 ), 'User Image', array( 'class' => 'img-circle  center-block', 'width' => '150px' ) ) ?>
						</section>
						<section class="col-md-9">
							<p class="profile-info">
								<span><?= _( 'Name - Lastname' ) ?></span> : <?= $user->name . ' - ' . $user->lastName ?>
							</p>

							<p class="profile-info">
								<span><?= _( 'E-mail' ) ?></span> : <?= $user->email ?>
							</p>

							<p class="profile-info">
								<span><?= _( 'User Role' ) ?></span> : <?= $user->getRole() ?>
							</p>

							<p class="profile-info">
								<span><?= _( 'GSM' ) ?></span> : <?= $user->gsm ?>
							</p>

							<p class="profile-info">
								<span><?= _( 'Member since' ) ?></span> : <?= $user->created_at->year?>
							</p>

							<p class="profile-info">
								<span><?= _( 'City / County' ) ?></span> : <?= $user->getCityName().' / '.$user->county ?>
							</p>

							<p class="profile-info">
								<?=Form::button(_('Pay Dues'),array('class'=>'btn btn-success','type'=>'button','id'=>'payDues','data-target'=>'#payDuesForm'))?>
							</p>

							<p class="profile-info">
								<a href="<?=URL::action('AdminController@getProfile',$user->id)?>" type="button" class="btn btn-primary"><?=_('Edit Member')?></a>
							</p>
						</section>
						<section class="col-md-12">
							<hr>
							<table class="table table-bordered">
								<tbody>
								<tr>
									<th><?= _( 'Year / Months' ) ?></th>
									<?php foreach ( Option::months() as $month ): ?>
										<th><?= $month ?></th>
									<?php endforeach ?>
								</tr>
								<?php foreach ( $duess as $dues ): ?>
									<tr>
										<td><?= $dues->year ?></td>
										<?php $months = unserialize( $dues->months );
										for ( $i = 1; $i <= 12; $i ++ ):
											if ( isset( $months[$i] ) ): $month=$months[$i] ?>
												<td><span class="badge bg-<?= $month['statusColor'] ?>"><?= $month['price'] ?> &nbsp; <i class="fa fa-try"></span></td>
											<?php else: ?>
												<td></td>
											<?php endif?>
										<?php endfor ?>
									</tr>
								<?php endforeach ?>
								</tbody>
							</table>
							<hr>
							<div id="payDuesForm" class="hidden">
								<?= Form::open( array(
										'action' => 'AdminController@postDues',
										'role'   => 'form',
										'method' => 'post' ) ) ?>
								<?=Form::hidden('userId',$user->id)?>
								<div class="form-group col-md-6">
									<?= Form::select( 'year', $user->getDuesYears(), null, array( 'class' => 'form-control' ) ) ?>
								</div>
								<div class="form-group col-md-6">
									<?= Form::select( 'month', Option::months(), null, array( 'class' => 'form-control' ) ) ?>
								</div>
								<div class="form-group col-md-12">
									<div class="input-group">
										<?= Form::text( 'price', '', array( 'class' => 'form-control', 'placeholder' => _( 'price' ) ) ) ?>
										<span class="input-group-addon"><i class="fa fa-try"></i></span>
									</div>
								</div>
								<?= Form::close() ?>
								<script>
									$(function () {

									});
								</script>
								<div class="clearfix"></div>
							</div>
						</section>
					<?php endif ?>
					<script>
						$(function () {
							/**
							 * Arama çubuğunda otomatik tamamlama işlemleri
							 */
							var column = $('#title-form .column').val();
							var values = new Bloodhound({
								datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
								queryTokenizer: Bloodhound.tokenizers.whitespace,
								remote        : '<?=URL::action('AdminController@getUserTypeAhead')?>' + '/' + column + '/%QUERY'
							});
							$('#title-form .column').change(function (e) {
								column = $(this).val();
								console.log($(this).attr('class'));
								values = new Bloodhound({
									datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
									queryTokenizer: Bloodhound.tokenizers.whitespace,
									remote        : '<?=URL::action('AdminController@getUserTypeAhead')?>' + '/' + column + '/%QUERY'
								});
								$('#title-form .typeahead').typeahead('destroy');
								values.initialize();
								$('#title-form .typeahead').typeahead(null, {
									source: values.ttAdapter()
								});
							});
							values.initialize();
							$('#title-form .typeahead').typeahead(null, {
								source: values.ttAdapter()
							});
							/* ----------*/
							var column = $('#content-form .column').val();
							$('#content-form .column').change(function (e) {
								column = $(this).val();
								console.log($(this).attr('class'));
								values = new Bloodhound({
									datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
									queryTokenizer: Bloodhound.tokenizers.whitespace,
									remote        : '<?=URL::action('AdminController@getUserTypeAhead')?>' + '/' + column + '/%QUERY'
								});
								$('#content-form .typeahead').typeahead('destroy');
								values.initialize();
								$('#content-form .typeahead').typeahead(null, {
									source: values.ttAdapter()
								});
							});
							values.initialize();
							$('#content-form .typeahead').typeahead(null, {
								source: values.ttAdapter()
							});
						});
					</script>
				</div>
				<!-- /.box-body -->
			</div>
	</section>
	<!-- /.content -->
</aside><!-- /.right-side -->