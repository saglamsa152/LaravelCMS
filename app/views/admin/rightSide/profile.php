<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small><?= _( 'Menage Profile' ) ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i class="fa fa-dashboard"></i> <?= _( 'Home' ) ?>
				</a></li>
			<li class="active"><?= _( 'Profile page' ) ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="box">
			<div class="box-body clearfix">
				<section class="col-md-9">
					<?=
					Form::open( array(
							'role'   => 'form',
							'id'     => 'user-form',
							'class'  => 'ajaxForm form-horizontal',
							'action' => 'AdminController@postUpdateUser',
							'method' => 'post'
					) )?>
					<?=Form::hidden('id',$user->id)?>
					<?=Form::hidden('meta[avatar]',$user->avatar)?>
					<h4 class="page-header"><?= _( 'Personal Information' ) ?></h4>
					<!-- Username -->
					<div class="form-group col-md-6">
						<?= Form::label( 'username', _( 'User Name :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<?= Form::text( 'username',$user->username, array( 'class' => 'form-control ' ) ) ?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

					<!-- Role -->
					<?php if ( userCan( 'editUserRole' ) ): ?>
					<div class="form-group col-md-6">
						<?= Form::label( 'role', _( 'User Role :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<?= Form::select('role',User::getRoles(),$user->role,array( 'class' => 'form-control ' ))?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<?php endif ?>
					<!-- Name -->
					<div class="form-group col-md-6">
						<?= Form::label( 'name', _( 'Name :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<?= Form::text( 'name',$user->name, array( 'class' => 'form-control ' ) ) ?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

					<!-- LastName -->
					<div class="form-group col-md-6">
						<?= Form::label( 'lastName', _( 'Last Name :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<?= Form::text( 'lastName',$user->lastName, array( 'class' => 'form-control ' ) ) ?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

					<!-- Birthday -->
					<div class="form-group col-md-6">
						<?= Form::label( 'birthday', _( 'Birthday :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<?= Form::text( 'birthday', $user->birthday, array( 'class' => 'form-control ','data-inputmask'=>'"alias": "yyyy.mm.dd"','data-mask'=>'' ) ) ?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="clearfix"></div>

					<h4 class="page-header"><?= _( 'Contact Information' ) ?></h4>

					<!-- Address -->
					<div class="form-group col-md-6">
						<?= Form::label( 'meta[address]', _( 'Address :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<?= Form::textarea( 'meta[address]',$user->address, array( 'class' => 'form-control', 'rows' => 3 ) ) ?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

					<!-- City -->
					<div class="form-group col-md-6">
						<?= Form::label( 'meta[city]', _( 'City :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<?= Form::select( 'meta[city]', Option::getOption('cities',null,true), $user->city, array( 'class' => 'form-control ','data'=>'cities' ) ) ?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

					<!-- Counties -->
					<?php
					$counties = Option::getOption( 'counties',null,true );
					if ( !empty( $user->city ) ) {
						asort( $counties[$user->city] );
						$counties = $counties[$user->city];
					}else{
						$counties= array(_('First select a city'));
					}
					?>
					<div class="form-group col-md-6">
						<?= Form::label( 'meta[county]', _( 'County :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<?= Form::select( 'meta[county]', $counties, $user->county, array( 'class' => 'form-control ' ) ) ?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

					<!-- GSM -->
					<div class="form-group col-md-6">
						<?= Form::label( 'meta[gsm]', _( 'GSM :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<div class="input-group-addon">
								<i class="fa fa-phone"></i>
							</div>
							<?=Form::text('meta[gsm]',$user->gsm,array('class'=>'form-control ','data-inputmask'=>'"mask": "(999) 999 99 99"','data-mask'=>''))?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

					<!-- Phone -->
					<div class="form-group col-md-6">
						<?= Form::label( 'meta[phone]', _( 'Phone :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-phone-alt"></span>
							</div>
							<?=Form::text('meta[phone]',$user->phone,array('class'=>'form-control ','data-inputmask'=>'"mask": "(999) 999 99 99"','data-mask'=>''))?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

					<!-- Email -->
					<div class="form-group col-md-6">
						<?= Form::label( 'email', _( 'e-mail :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<div class="input-group-addon">
								<b>@</b>
							</div>
							<?= Form::text( 'email',$user->email, array( 'class' => 'form-control' ) ) ?>
						</div>
					</div>

					<div class="clearfix"></div>
					<h4 class="page-header"><?= _( 'Social Information' ) ?></h4>

					<!-- Twitter -->
					<div class="form-group col-md-6">
						<?= Form::label( 'meta[twitter]', 'Twitter :', array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<div class="input-group-addon">
								<i class="fa fa-twitter-square"></i>
							</div>
							<?=Form::text('meta[twitter]',$user->twitter,array('class'=>'form-control'))?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

					<!-- Facebook -->
					<div class="form-group col-md-6">
						<?= Form::label( 'meta[facebook]', 'Facebook :', array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<div class="input-group-addon">
								<i class="fa fa-facebook-square"></i>
							</div>
							<?=Form::text('meta[facebook]',$user->facebook,array('class'=>'form-control'))?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="clearfix"></div>
					<?= Form::submit( _( 'Save' ), array( 'class' => 'btn btn-primary pull-right' ) ) ?>

					<?= Form::close() ?>
				</section><!-- /.col-md-9 -->

				<section class="col-md-3 no-padding">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs pull-right">
							<li class="active"><a data-toggle="tab" href="#view-tab"><?= _( 'View' ) ?></a></li>
							<li><a data-toggle="tab" href="#upload-tab"><i class="fa fa-cloud-upload"></i> </a></li>
							<li class="pull-left header"><?= _( 'Avatar' ) ?></li>
						</ul>
						<div class="tab-content">
							<div id="view-tab" class="tab-pane active">
								<?= HTML::image( $user->getAvatarUrl(150), 'User Image', array( 'class' => 'img-circle  center-block','width'=>'150px' ) ) ?>
								<button id="clear" type="button" class="btn btn-danger pull-right"><?= _( 'Clear' ) ?></button>
								<div class="clearfix"></div>
							</div><!-- /#view .tab-pane -->
							<div id="upload-tab" class="tab-pane" data-trigger="hover" data-placement="left" data-title="Gravatar">
								<div class="hidden" id="gravatar-message">
									<?=_('Eğer Gravatar kullanıyosanız resim yüklemenize gerek yok.Gravatar resminiz gözükecektir ')?>
								</div>
								<?= Form::open( array(
										'role'    => 'form',
										'id'      => 'upload',
										'action'  => 'AdminController@postAvatarUpload',
										'method'  => 'post',
										'enctype' => 'multipart/form-data' ) ) ?>
								<div id="drop">
									<?=_('Drop Here')?>

									<a><?=_('Browse')?></a>
									<input type="file" name="upl" />
								</div>

								<ul>
									<!-- The file uploads will be shown here -->
								</ul>
								<?=Form::close()?>
								<script type="text/javascript">
									$(function(){
										$('#upload-tab').popover({content:$('#gravatar-message').html()});
									});
								</script>
							</div><!-- /#upload .tab-pane -->
						</div><!-- /.tab-content -->
					</div><!-- /.nav-tabs-custom -->
				</section><!-- /.col-md-3 -->
				<!-- Password Update -->
				<?php if ( Auth::user()->id == $user->id ): ?>
				<section class="col-md-3 no-padding">
					<div id="updatePassword" class="box box-primary">
						<div class="box-header" >
							<h3 class="box-title"><?=_('Password Update')?></h3>
							<div class="box-tools pull-right">
								<button id="collapseButton" data-widget="collapse" class="btn btn-primary btn-xs"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body" style="display: block;">
							<?=Form::open( array(
									'role'   => 'form',
									'class'  => 'ajaxFormPassword',
									'action' => 'AdminController@postUpdateUserPassword',
									'method' => 'post'
							) )?>
							<?=Form::hidden('id',$user->id)?>
							<!-- Current Password -->
							<div id="currentPassword" class="form-group col-md-12">
								<div class="input-group col-md-12">
									<div class="input-group-addon">
										<i class="fa fa-lock"></i>
									</div>
									<?=Form::password('currentPassword',array('class'=>'form-control','placeholder'=>_('Current Password')))?>
								</div><!-- /.input group -->
							</div><!-- /.form group -->

							<!-- New Password -->
							<div id="password" class="form-group col-md-12">
								<div class="input-group col-md-12">
									<div class="input-group-addon">
										<i class="fa fa-lock"></i>
									</div>
									<?=Form::password('password',array('class'=>'form-control','placeholder'=>_('New Password')))?>
								</div><!-- /.input group -->
							</div><!-- /.form group -->

							<!-- Confirmation Password -->
							<div id="password_confirmation" class="form-group col-md-12">
								<div class="input-group col-md-12">
									<div class="input-group-addon">
										<i class="fa fa-lock"></i>
									</div>
									<?=Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>_('Password Confirmation')))?>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="clearfix"></div>
						</div><!-- /.box-body -->
						<div class="box-footer" style="display: block;">
							<?=Form::submit(_('Update'),array('class' => 'btn btn-primary pull-right'))?>
							<div class="clearfix"></div>
						</div><!-- /.box-footer-->
						<?=Form::close()?>
					</div><!-- /.box box-primary-->
				</section><!-- /.col-md-3 -->
			<?php endif;?>
			</div>

		</div>
	</section>
	<!-- /.content -->
</aside><!-- /.right-side -->