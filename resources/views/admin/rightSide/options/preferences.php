<aside class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small><?= _( 'Menage Site Preferences' ) ?></small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i class="fa fa-dashboard"></i> <?= _( 'Admin Home' ) ?>
				</a></li>
			<li class="active"><?= $title ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">

				<div class="box ">
					<div class="box-header">
						<h3 class="box-title"><?= _( 'Site Preferences' ) ?></h3>
					</div><!-- /.box-header-->
					<div class="box-body">
						<?= Form::open( array(
								'role'   => 'form',
								'id'     => 'siteOptions',
								'class'  => 'form-horizontal ajaxForm',
								'method' => 'post',
								'action' => 'OptionsController@postSave',
								'title'  => _( 'Save Options' ) ) )
						?>
						<?= Form::hidden( 'type', 'preference' ) ?>
						<div class="col-md-6">
						<!-- Theme Skin -->
							<!-- TODO tema değişimini  tıklandığı anda admin teması demo.js dosyası değiştiriyot ve HTML5 storage özelliği ile tarayıcıda saklıyor. -->
							<?=Form::hidden('options[themeSkin]','')?>
						<ul id="skinList" class="list-unstyled clearfix">
							<li style="float:left; width: 33.33333%; padding: 5px;">
								<a class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" data-skin="skin-blue" href="javascript:void(0);">
									<div>
										<span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9;"></span>
										<span style="display:block; width: 80%; float: left; height: 7px;" class="bg-light-blue"></span>
									</div>
									<div>
										<span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
										<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
									</div>
								</a>

								<p class="text-center no-margin">Blue</p>
							</li>
							<li style="float:left; width: 33.33333%; padding: 5px;">
								<a class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" data-skin="skin-black" href="javascript:void(0);">
									<div class="clearfix" style="box-shadow: 0 0 2px rgba(0,0,0,0.1)">
										<span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe;"></span>
										<span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe;"></span>
									</div>
									<div>
										<span style="display:block; width: 20%; float: left; height: 20px; background: #222;"></span>
										<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
									</div>
								</a>

								<p class="text-center no-margin">Black</p>
							</li>
							<li style="float:left; width: 33.33333%; padding: 5px;">
								<a class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" data-skin="skin-purple" href="javascript:void(0);">
									<div>
										<span class="bg-purple-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
										<span style="display:block; width: 80%; float: left; height: 7px;" class="bg-purple"></span>
									</div>
									<div>
										<span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
										<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
									</div>
								</a>

								<p class="text-center no-margin">Purple</p>
							</li>
							<li style="float:left; width: 33.33333%; padding: 5px;">
								<a class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" data-skin="skin-green" href="javascript:void(0);">
									<div>
										<span class="bg-green-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
										<span style="display:block; width: 80%; float: left; height: 7px;" class="bg-green"></span>
									</div>
									<div>
										<span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
										<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
									</div>
								</a>

								<p class="text-center no-margin">Green</p>
							</li>
							<li style="float:left; width: 33.33333%; padding: 5px;">
								<a class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" data-skin="skin-red" href="javascript:void(0);">
									<div>
										<span class="bg-red-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
										<span style="display:block; width: 80%; float: left; height: 7px;" class="bg-red"></span>
									</div>
									<div>
										<span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
										<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
									</div>
								</a>

								<p class="text-center no-margin">Red</p>
							</li>
							<li style="float:left; width: 33.33333%; padding: 5px;">
								<a class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" data-skin="skin-yellow" href="javascript:void(0);">
									<div>
										<span class="bg-yellow-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
										<span style="display:block; width: 80%; float: left; height: 7px;" class="bg-yellow"></span>
									</div>
									<div>
										<span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
										<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
									</div>
								</a>

								<p class="text-center no-margin">Yellow</p>
							</li>
							<li style="float:left; width: 33.33333%; padding: 5px;">
								<a class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" data-skin="skin-blue-light" href="javascript:void(0);">
									<div>
										<span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9;"></span>
										<span style="display:block; width: 80%; float: left; height: 7px;" class="bg-light-blue"></span>
									</div>
									<div>
										<span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
										<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
									</div>
								</a>

								<p style="font-size: 12px" class="text-center no-margin">Blue Light</p>
							</li>
							<li style="float:left; width: 33.33333%; padding: 5px;">
								<a class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" data-skin="skin-black-light" href="javascript:void(0);">
									<div class="clearfix" style="box-shadow: 0 0 2px rgba(0,0,0,0.1)">
										<span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe;"></span>
										<span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe;"></span>
									</div>
									<div>
										<span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
										<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
									</div>
								</a>

								<p style="font-size: 12px" class="text-center no-margin">Black Light</p>
							</li>
							<li style="float:left; width: 33.33333%; padding: 5px;">
								<a class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" data-skin="skin-purple-light" href="javascript:void(0);">
									<div>
										<span class="bg-purple-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
										<span style="display:block; width: 80%; float: left; height: 7px;" class="bg-purple"></span>
									</div>
									<div>
										<span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
										<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
									</div>
								</a>

								<p style="font-size: 12px" class="text-center no-margin">Purple Light</p>
							</li>
							<li style="float:left; width: 33.33333%; padding: 5px;">
								<a class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" data-skin="skin-green-light" href="javascript:void(0);">
									<div>
										<span class="bg-green-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
										<span style="display:block; width: 80%; float: left; height: 7px;" class="bg-green"></span>
									</div>
									<div>
										<span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
										<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
									</div>
								</a>

								<p style="font-size: 12px" class="text-center no-margin">Green Light</p>
							</li>
							<li style="float:left; width: 33.33333%; padding: 5px;">
								<a class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" data-skin="skin-red-light" href="javascript:void(0);">
									<div>
										<span class="bg-red-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
										<span style="display:block; width: 80%; float: left; height: 7px;" class="bg-red"></span>
									</div>
									<div>
										<span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
										<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
									</div>
								</a>

								<p style="font-size: 12px" class="text-center no-margin">Red Light</p>
							</li>
							<li style="float:left; width: 33.33333%; padding: 5px;">
								<a class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" data-skin="skin-yellow-light" href="javascript:void(0);">
									<div>
										<span class="bg-yellow-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
										<span style="display:block; width: 80%; float: left; height: 7px;" class="bg-yellow"></span>
									</div>
									<div>
										<span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
										<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
									</div>
								</a>

								<p style="font-size: 12px;" class="text-center no-margin">Yellow Light</p>
							</li>
						</ul>
						<script type="text/javascript">
							//tema ikonuna tıklayınca inputa tema verisi aktarılıyor
							$('#skinList li a').click(function(){
								var skin= $(this).attr('data-skin');
								$('input[name="options[themeSkin]"]').val(skin);
							})
						</script>
						</div>
					</div><!-- /.box-body-->
					<div class="box-footer clearfix">
						<?= Form::button( _( 'Save' ) . ' <i class="fa fa-arrow-circle-right"></i>', array( 'class' => 'pull-right btn btn-default', 'type' => 'submit' ) ) ?>
						<?= Form::close(); ?>

					</div><!-- /.box-footer -->
				</div><!-- /.box -->
			</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</aside><!-- /.right-side -->