<?php use App\MyClasses\FileManager\FileManager;?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?=_('Dashboard')?>
			<small><?=_('Control panel')?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=URL::action('AdminController@getIndex')?>"><i class="fa fa-dashboard"></i> <?=_('Dashboard')?></a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-12">
				<?php if (Hash::check('123456', Auth::getUser()->getAuthPassword()) && Auth::user()->username==='admin'):?>
					<div class="callout callout-danger">
						<h4><?=_('Password Warning !')?></h4>
						<p><?=_('Your password is "123456" which set by default. Please change password so this is important your security.')?></p>
					</div>
				<?php endif;?>

			</div>
			<div class="col-lg-6 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<h3>
							<?=Post::news()->count('*')?>
						</h3>

						<p>
							<?=_('Total News')?>
						</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="<?=URL::action('AdminController@getNews')?>" class="small-box-footer">
						<?=_('More info')?> <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
			<div class="col-lg-6 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3>
							<?=User::count('id')?>
						</h3>

						<p>
							<?=_('Total Member')?>
						</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="<?=URL::action('AdminController@getUsers')?>" class="small-box-footer">
						<?=_('More info')?> <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->

		</div><!-- /.row -->

		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-lg-6">

				<!-- Calendar -->
				<div class="box box-warning">
					<div class="box-header">
						<i class="fa fa-calendar"></i>

						<div class="box-title"><?=_('Calendar')?></div>

						<!-- tools box -->
						<div class="pull-right box-tools">
							<!-- button with a dropdown -->
							<div class="btn-group">
								<button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i>
								</button>
								<ul class="dropdown-menu pull-right" role="menu">
									<li><a href="#"><?=_('Add new event')?></a></li>
									<li><a href="#"><?=_('Clear events')?></a></li>
									<li class="divider"></li>
									<li><a href="#"><?=_('View calendar')?></a></li>
								</ul>
							</div>
						</div>
						<!-- /. tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<!--The calendar -->
						<div id="calendar"></div>
					</div>
					<!-- /.box-body -->
				</div><!-- /.box -->
			</section><!-- /.Left col -->

			<!-- right col (We are only adding the ID to make the widgets sortable)-->
			<section class="col-lg-6">
				<!-- quick email widget -->
				<div class="box box-info">
					<div class="box-header">
						<i class="fa fa-envelope"></i>

						<h3 class="box-title"><?=_('Send Message to Admin')?></h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
							<button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-primary btn-sm pull-right">
								<i class="fa fa-minus"></i>
							</button>
						</div><!-- /. tools -->
					</div>
					<div class="box-body">
                        <?=Form::open(array('role' => 'form','id' =>'ContactForm','action'=>'AdminController@postSendMessageToAdmin','class'=>'ajaxForm'))?>
                        <?=Form::hidden('name',Auth::user()->getScreenName())?>
                        <?=Form::hidden('email',Auth::user()->email)?>
                        <div>
                            <?=Form::textarea('message','',array('placeholder'=>_('Message'),'id'=>'message'))?>
                        </div>
					</div>
					<div class="box-footer clearfix">
						<button class="pull-right btn btn-default" id="sendEmail"><?=_('Send')?> <i class="fa fa-arrow-circle-right"></i>
						</button>
					</div>
					<?=Form::close()?>
				</div>
			</section><!-- right col -->
		</div><!-- /.row (main row) -->
	</section><!-- /.content -->
</aside><!-- /.content-wrapper -->