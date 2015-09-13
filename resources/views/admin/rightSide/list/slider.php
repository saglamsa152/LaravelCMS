<aside class="content-wrapper">
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

						<div class="box-tools">
							<button id="newSlide" type="button" class="btn btn-success pull-right" html-target="#newSlideTarget">
								<i class="fa fa-plus"></i> <?= _( 'Add New' ) ?>
							</button>

							<div id="newSlideTarget" class="hidden">
								<?=Form::open(array('action'=>'AdminController@postAddPost','method'=>'post','role'=>'form','enctype' => 'multipart/form-data'))?>
								<?=Form::hidden('type','slider')?>
								<?=Form::hidden('status','publish')?>
								<p class="center-block">
									<span class="btn btn-success fileinput-button pull-left">
        						<i class="glyphicon glyphicon-plus"></i>
        						<span><?= _( 'Select Image' ) ?></span>
        						<!-- The file input field used as target for the file upload widget -->
        						<input id="SlideImageUpload" class="" type="file" name="fileupload" data-url="<?= URL::action( 'AdminController@postUploadSliderImage' ) ?>">
    							<?=Form::hidden('postMeta[image]')?>
									</span>
									<button id="saveimage" type="button" class="btn btn-primary pull-right hidden">
										<i class="fa fa-save"></i> <?= _( 'Upload Image' ) ?>
									</button>
								<script type="text/javascript">
									$(function () {
										$('#SlideImageUpload').fileupload({
											dataType: 'json',
											add: function (e,data) {
												$('#saveimage').removeClass('hidden');
												$('#saveimage').on('click', function (e) {
													data.submit();
													$(this).text('<?=_('Image Uploading...')?>');
												});
											},
											done: function (e, data) {
												$('input[name="postMeta[image]"]').val(data._response.result['url']);
												$('#saveimage').html('<i class="fa fa-save"></i> <?=_('Image Uploaded')?>');
												setTimeout(function () {
													$('#saveimage').html('<i class="fa fa-save"></i> <?=_('Upload Image')?>').addClass('hidden');
												},2000);
											}
										});
									})
								</script>
									<div class="clearfix"></div>
								</p>
								<p class="center-block"><?= Form::text( 'url', '', array( 'class' => 'form-control input-sm','placeholder'=>_('Slide url') ) ) ?></p>

								<p class="center-block"><?= Form::text( 'title', '', array( 'class' => 'form-control slide-input input-sm' ,'placeholder'=>_('Slide title')) ) ?></p>

								<p class="center-block"><?= Form::textarea( 'content', '', array( 'class' => 'form-control slide-input input-sm', 'rows' => '2','placeholder'=>_('Slide content') ) ) ?></p>

								<div class="clearfix"></div>
								<?=Form::close()?>
							</div><!-- /#newSlideTarget -->
						</div><!-- &.box-tools -->
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
												<img id="slide_<?=$slide->id?>_image" alt="<?= $slide->title ?>" src="<?= URL::asset( $slide->image ) ?>">
												<div class="carousel-caption col-md-7 hidden"><!-- rsim üzerinde okunmadığı  ve temada resim üzerinde resim olmadığı için gizledim -->
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

									<div class="carousel-inner">
										<script>
											function previewFile(id) {
												/**
												 * Resmi  yüklemeden ön izleme oluşturmak için
												 * https://developer.mozilla.org/en-US/docs/Web/API/FileReader.readAsDataURL
												 * @type {HTMLElement}
												 */
												var preview = document.querySelector('img#slide_'+id+'_image');
												var file    = document.querySelector('#fileupload').files[0];
												var reader  = new FileReader();

												reader.onloadend = function () {
													preview.src = reader.result;
												}

												if (file) {
													reader.readAsDataURL(file);
												} else {
													preview.src = "";
												}
											}
										</script>
										<?php $active = true;
										foreach ( $slides as $slide ): ?>
											<div class="item <?php if ( $active ) {
												echo 'active';
												$active = false;
											} ?>">
												<img alt="<?= $slide->title ?>" src="<?= URL::asset( 'assets/images/white.jpg' ) ?>">

												<div class="carousel-caption" style="padding: 0px;">
													<p class="center-block">

														<span class="btn btn-success fileinput-button pull-left">
        											<i class="glyphicon glyphicon-plus"></i>
        											<span><?=_('Select Image')?></span>
        											<!-- The file input field used as target for the file upload widget -->
        											<input id="fileupload" class="" type="file" name="fileupload" data-id="<?=$slide->id?>" data-url="<?=URL::action('AdminController@postUploadSliderImage') ?>" onchange="previewFile(<?=$slide->id?>)">
    												</span>
														<button id="saveimage_<?=$slide->id?>" type="button" class="btn btn-primary pull-right hidden"><i class="fa fa-save"></i> <?=_('Upload Image')?></button>
														<div class="clearfix"></div>
													</p>
													<?=Form::hidden('slide[' . $slide->id . '][meta][image]',$slide->image)?>
													<p class="center-block"><?= Form::text( 'slide[' . $slide->id . '][url]', $slide->url, array( 'class' => 'form-control input-sm' ) ) ?></p>

													<p class="center-block"><?= Form::text( 'slide[' . $slide->id . '][title]', $slide->title, array( 'class' => 'form-control slide-input input-sm', 'data-show' => 'slide_' . $slide->id . '_title-showed' ) ) ?></p>

													<p class="center-block"><?= Form::textarea( 'slide[' . $slide->id . '][content]', $slide->content, array( 'class' => 'form-control slide-input input-sm', 'rows' => '2', 'data-show' => 'slide_' . $slide->id . '_content-showed' ) ) ?></p>

													<p class="center-block">
														<?= Form::submit( _( 'Save' ), array( 'class' => 'btn btn-primary btn-sm pull-right' ) ) ?>
														<?= Form::button( _( 'Delete' ), array( 'class' => 'btn btn-danger btn-sm pull-left', 'data-action' => 'delete','data-id'=>$slide->id,'data-url'=>URL::action( 'AdminController@postDeletePost' ),'type'=>'button','token'=>Form::token() ) ) ?>
													</p>
												</div>
											</div>
										<?php endforeach ?>
									</div>
								</div>
								<?= Form::close() ?>
								<script type="text/javascript">
									$(function () {
										$('#fileupload').fileupload({
											dataType: 'json',
											add: function (e,data) {
												var id= data.fileInput.attr('data-id');
												$('#saveimage_'+id).removeClass('hidden');
												$('#saveimage_'+id).on('click', function (e) {
													data.submit();
													$(this).text('<?=_('Image Uploading...')?>');
												});
											},
											done: function (e, data) {
												$('input[name="slide['+data.id+'][meta][image]"]').val(data._response.result['url']);
												$('#saveimage_'+data.id).html('<i class="fa fa-save"></i> <?=_('Image Uploaded')?>');
												setTimeout(function () {
													$('#saveimage_'+data.id).html('<i class="fa fa-save"></i> <?=_('Upload Image')?>');
												},1500);
											}
										});
										var slide = $('#carousel-slider');
										var slide_form = $('#carousel-slider-form')
										$('#slide-prev').click(function () {
											slide_form.carousel('prev');
											slide.carousel('pause');
											slide_form.carousel('pause');
										});
										$('#slide-next').click(function () {
											slide_form.carousel('next');
											slide.carousel('pause');
											slide_form.carousel('pause');
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

	</section><!-- /.content -->
</aside><!-- /.right-side -->