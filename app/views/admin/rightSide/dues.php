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
				<h4 class="box-title"><?=_('Dues')?></h4>

				<div class="box-tools">
					<form class="search-form">
						<div class="input-group col-md-3 input-group-sm pull-right">
							<input type="text" class="form-control input-sm" placeholder="<?=_('Search')?>">
							<div class="input-group-btn">
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-search"></i>
									<span class="caret"></span></button>
								<ul class="dropdown-menu dropdown-menu-right" role="group">
									<li><a href="#">ID</a></li>
									<li><a href="#"><?= _( 'User Name' ) ?></a></li>
									<li><a href="#"><?= _( 'User Email' ) ?></a></li>
								</ul>
							</div><!-- /.input-group-btn -->
						</div><!-- /input-group -->
					</form><!-- /search-form -->
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="error-page error-page-without-headline">
					<div class="error-content text-center">
						<h3><i class="fa fa-warning text-yellow"></i> <?=_('You should select a member')?></h3>
						<p>
							<?=_('To view the dues information you must first select a user.')?>
						</p>
						<form class="search-form">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="<?=_('Search')?>">
								<div class="input-group-btn">
									<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-search"></i>
										<span class="caret"></span></button>
									<ul class="dropdown-menu dropdown-menu-right" role="group">
										<li><a href="#">ID</a></li>
										<li><a href="#"><?= _( 'User Name' ) ?></a></li>
										<li><a href="#"><?= _( 'User Email' ) ?></a></li>
									</ul>
								</div><!-- /.input-group-btn -->
						</form><!-- /search-form -->
					</div>
				</div>
			</div><!-- /.box-body -->
		</div>
	</section>
	<!-- /.content -->
</aside><!-- /.right-side -->