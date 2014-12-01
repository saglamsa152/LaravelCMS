<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= _( 'Slides' ) ?>
			<small>advanced tables</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i class="fa fa-dashboard"></i> <?= _( 'Home' ) ?>
				</a></li>
			<li><a href="<?= URL::action( 'AdminController@getSlider' ) ?>"><?= _( 'Slides' ) ?></a></li>
			<li class="active"><?= _( 'List' ) ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= _( 'Slides' ) ?></h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="carousel slide " id="carousel-slider" data-wrap="false">
									<ol class="carousel-indicators">
										<?php	$active = true; $i= 0;foreach ( $slides as $slide ): ?>
											<li class="<?php if ( $active ) {echo 'active';$active = false;} ?>" data-slide-to="<?= $i ?>" data-target="#carousel-slider"></li>
										<?php $i ++; endforeach ?>
									</ol>
									<div class="carousel-inner">
										<?php $active = true;foreach ( $slides as $slide ): ?>
											<div class="item <?php if ( $active ) {echo 'active';$active = false;} ?>">
												<img alt="<?= $slide->title ?>" src="<?= URL::asset( $slide->image ) ?>">
												<div class="carousel-caption col-md-7">
													<h4 id="slide_<?= $slide->id ?>_title-showed" class="center-block"><?= $slide->title ?></h4>

													<p id="slide_<?= $slide->id ?>_content-showed" class="center-block"><?= $slide->content ?></p>
												</div>
											</div>
										<?php endforeach ?>
									</div>
									<a id="slide-prev" data-slide="prev" href="#carousel-slider" class="left carousel-control">
										<span class="glyphicon glyphicon-chevron-left"></span>
									</a>
									<a id="slide-next" data-slide="next" href="#carousel-slider" class="right carousel-control">
										<span class="glyphicon glyphicon-chevron-right"></span>
									</a>
								</div>
							</div>
							<div class="col-md-6">
								<?= Form::open( array(
										'role'   => 'form',
										'method' => 'post',
										'class'  => 'ajaxButton',
										'action' => 'AdminController@postUpdateSlide'
								) ) ?>
								<div class="carousel slide " id="carousel-slider-form" data-wrap="false">
									<ol class="carousel-indicators">
										<?php $active = true;$i = 0;foreach ( $slides as $slide ): ?>
											<li class="<?php if ( $active ) {	echo 'active';$active = false;} ?>" data-slide-to="<?= $i ?>" data-target="#carousel-slider-form"></li>
										<?php $i ++; endforeach ?>
									</ol>
									<div class="carousel-inner">
										<?php $active = true;foreach ( $slides as $slide ): ?>
											<div class="item <?php if ( $active ) { echo 'active';$active = false;} ?>">
												<img alt="<?= $slide->title ?>" src="<?= URL::asset( 'assets/images/white.jpg' ) ?>">

												<div class="carousel-caption">
													<p class="center-block"><?= Form::text( 'slide[' . $slide->id . '][url]', $slide->url, array( 'class' => 'form-control input-sm' ) ) ?></p>

													<p class="center-block"><?= Form::text( 'slide[' . $slide->id . '][title]', $slide->title, array( 'class' => 'form-control slide-input input-sm', 'data-show' => 'slide_' . $slide->id . '_title-showed' ) ) ?></p>

													<p class="center-block"><?= Form::textarea( 'slide[' . $slide->id . '][content]', $slide->content, array( 'class' => 'form-control slide-input input-sm', 'rows' => '2', 'data-show' => 'slide_' . $slide->id . '_content-showed' ) ) ?></p>
													<p class="center-block">
													<?= Form::submit( _( 'Save' ), array( 'class' => 'btn btn-primary btn-sm pull-right' ) ) ?>
													<?=Form::button( _('Delete'),array('class' => 'btn btn-danger btn-sm pull-left','data-action'=>'delete' ))?>
													</p>
												</div>
											</div>
										<?php endforeach ?>
									</div>
								</div>
								<?= Form::close() ?>
								<script type="text/javascript">
									$(function () {
										var slide = $('#carousel-slider');
										var slide_form = $('#carousel-slider-form')
										$('#slide-prev').click(function () {
											slide_form.carousel('prev');
											slide.carousel('pause')
										});
										$('#slide-next').click(function () {
											slide_form.carousel('next');
											slide.carousel('pause');
										});
										$('.slide-input').change(function () {
											var show = $(this).attr('data-show');
											var Value = $(this).val();
											$('#' + show, slide).html(Value);
										});

									});
								</script>
							</div>
						</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
		</div>

	</section>
	<!-- /.content -->
</aside><!-- /.right-side -->