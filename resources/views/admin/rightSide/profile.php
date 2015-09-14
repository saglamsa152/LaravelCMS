<!-- Right side column. Contains the navbar and content of the page -->
<aside class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small><?= _( 'Menage Profile' ) ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i
						class="fa fa-dashboard"></i> <?= _( 'Home' ) ?>
				</a></li>
			<li class="active"><?= _( 'Profile page' ) ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<section class="col-md-9 clearfix">
				<div class="box ">
					<div class="box-body">
						<?=
						Form::open( array(
							'role'   => 'form',
							'id'     => 'userForm',
							'class'  => 'ajaxForm form-horizontal',
							'action' => 'AdminController@postUpdateUser',
							'method' => 'post',
							'title'  => _( 'Save Profile' )
						) ) ?>
						<?= Form::hidden( 'id', $user->id ) ?>
						<?= Form::hidden( 'meta[avatar]', $user->avatar,array('id'=>'metaAvatar') ) ?>
						<h4 class="page-header">
							<?= _( 'Personal Information' ) ?>
						</h4>
						<!-- Username -->
						<div class="form-group col-md-6">
							<?= Form::label( 'username', _( 'User Name :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
							<div class="input-group col-md-8">
								<?= Form::text( 'username', $user->username, array( 'class' => 'form-control ' ) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->

						<!-- Role -->
						<?php if ( userCan( 'editUserRole' ) ): ?>
							<div class="form-group col-md-6">
								<?= Form::label( 'role', _( 'User Role :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
								<div class="input-group col-md-8">
									<?= Form::select( 'role', User::getRoles(), $user->role, array( 'class' => 'form-control ' ) ) ?>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
						<?php endif ?>
						<!-- Name -->
						<div class="form-group col-md-6">
							<?= Form::label( 'name', _( 'Name :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
							<div class="input-group col-md-8">
								<?= Form::text( 'name', $user->name, array( 'class' => 'form-control ' ) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->

						<!-- LastName -->
						<div class="form-group col-md-6">
							<?= Form::label( 'lastName', _( 'Last Name :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
							<div class="input-group col-md-8">
								<?= Form::text( 'lastName', $user->lastName, array( 'class' => 'form-control ' ) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->

						<!-- Birthday -->
						<div class="form-group col-md-6">
							<?= Form::label( 'birthday', _( 'Birthday :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
							<div class="input-group col-md-8">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<?= Form::text( 'birthday', $user->birthday, array(
									'class'          => 'form-control ',
									'data-inputmask' => '"alias": "yyyy.mm.dd"',
									'data-mask'      => ''
								) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->

						<!-- Member since -->
						<div class="form-group col-md-6">
							<?= Form::label( 'created_at', _( 'Member since :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
							<div class="input-group col-md-8">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<?= Form::text( 'created_at', $user->created_at, array(
									'class'          => 'form-control ',
									'data-inputmask' => '"alias": "yyyy-mm-dd"',
									'data-mask'      => ''
								) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<div class="clearfix"></div>

						<h4 class="page-header"><?= _( 'Contact Information' ) ?></h4>

						<!-- Address -->
						<div class="form-group col-md-6">
							<?= Form::label( 'meta[address]', _( 'Address :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
							<div class="input-group col-md-8">
								<?= Form::textarea( 'meta[address]', $user->address, array(
									'class' => 'form-control',
									'rows'  => 3
								) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->

						<!-- City -->
						<div class="form-group col-md-6">
							<?= Form::label( 'meta[city]', _( 'City :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
							<div class="input-group col-md-8">
								<?= Form::select( 'meta[city]', Option::getOption( 'cities', null, true ), $user->city, array(
									'class' => 'form-control ',
									'data'  => 'cities'
								) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->

						<!-- Counties -->
						<?php
						$counties = Option::getOption( 'counties', null, true );
						if ( ! empty( $user->city ) ) {
							asort( $counties[ $user->city ] );
							$counties = $counties[ $user->city ];
						} else {
							$counties = array( _( 'First select a city' ) );
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
								<?= Form::text( 'meta[gsm]', $user->gsm, array(
									'class'          => 'form-control ',
									'data-inputmask' => '"mask": "0(999) 999 99 99"',
									'data-mask'      => ''
								) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->

						<!-- Phone -->
						<div class="form-group col-md-6">
							<?= Form::label( 'meta[phone]', _( 'Phone :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
							<div class="input-group col-md-8">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-phone-alt"></span>
								</div>
								<?= Form::text( 'meta[phone]', $user->phone, array(
									'class'          => 'form-control ',
									'data-inputmask' => '"mask": "0(999) 999 99 99"',
									'data-mask'      => ''
								) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->

						<!-- Email -->
						<div class="form-group col-md-6">
							<?= Form::label( 'email', _( 'e-mail :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
							<div class="input-group col-md-8">
								<div class="input-group-addon">
									<b>@</b>
								</div>
								<?= Form::text( 'email', $user->email, array( 'class' => 'form-control' ) ) ?>
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
								<?= Form::text( 'meta[twitter]', $user->twitter, array( 'class' => 'form-control' ) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->

						<!-- Facebook -->
						<div class="form-group col-md-6">
							<?= Form::label( 'meta[facebook]', 'Facebook :', array( 'class' => 'control-label col-md-4' ) ) ?>
							<div class="input-group col-md-8">
								<div class="input-group-addon">
									<i class="fa fa-facebook-square"></i>
								</div>
								<?= Form::text( 'meta[facebook]', $user->facebook, array( 'class' => 'form-control' ) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->

						<!-- Linkedin -->
						<div class="form-group col-md-6">
							<?= Form::label( 'meta[linkedin]', 'Linkedin :', array( 'class' => 'control-label col-md-4' ) ) ?>
							<div class="input-group col-md-8">
								<div class="input-group-addon">
									<i class="fa fa-linkedin-square"></i>
								</div>
								<?= Form::text( 'meta[linkedin]', $user->linkedin, array( 'class' => 'form-control' ) ) ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<div class="clearfix"></div>
						<?= Form::submit( _( 'Save' ), array( 'class' => 'btn btn-primary pull-right' ) ) ?>
						<div class="clearfix"></div>
						<?= Form::close() ?>
					</div><!-- /.box-body-->
				</div><!-- /.box -->
			</section><!-- /.col-md-9 -->

			<!-- Avatar tab-->
			<section class="col-md-3">
				<div class="row">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title"><?= _( 'Avatar' ) ?></h3>
						</div>
						<div class="box-body">
							<?= HTML::image( $user->getAvatarUrl( 150 ), 'User Image', array(
								'class' => 'img-circle  center-block',
								'id'=> 'userAvatar',
								'width' => '150px'
							) ) ?>
							<button id="clear" type="button" class="btn btn-danger pull-right"
									targetFormElement='#userForm input[name="meta[avatar]"]'><?= _( 'Clear' ) ?></button>
							<?php
							fileManager()->getOpenButton(array('type'=>1,'field_id'=>'metaAvatar','fldr'=>'profile_image','btn_title'=>_('Change'),'targetImageId'=>'userAvatar'));
							?>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</section><!-- /.col-md-3 -->
			<!-- Password Update -->
			<?php if ( Auth::user()->id == $user->id ): ?>
				<section class="col-md-3 ">
					<div class="row">
						<div id="updatePassword" class="box box-primary collapsed-box">
							<div class="box-header">
								<h3 class="box-title"><?= _( 'Password Update' ) ?></h3>

								<div class="box-tools pull-right">
									<button id="collapseButton" data-widget="collapse" class="btn btn-primary btn-xs">
										<i class="fa fa-minus"></i></button>
								</div>
							</div>
							<div class="box-body" style="display: none;">
								<?= Form::open( array(
									'role'   => 'form',
									'class'  => 'ajaxFormPassword',
									'action' => 'AdminController@postUpdateUserPassword',
									'method' => 'post'
								) ) ?>
								<?= Form::hidden( 'id', $user->id ) ?>
								<!-- Current Password -->
								<div id="currentPassword" class="form-group col-md-12">
									<div class="input-group col-md-12">
										<div class="input-group-addon">
											<i class="fa fa-lock"></i>
										</div>
										<?= Form::password( 'currentPassword', array(
											'class'       => 'form-control',
											'placeholder' => _( 'Current Password' )
										) ) ?>
									</div><!-- /.input group -->
								</div><!-- /.form group -->

								<!-- New Password -->
								<div id="password" class="form-group col-md-12">
									<div class="input-group col-md-12">
										<div class="input-group-addon">
											<i class="fa fa-lock"></i>
										</div>
										<?= Form::password( 'password', array(
											'class'       => 'form-control',
											'placeholder' => _( 'New Password' )
										) ) ?>
									</div><!-- /.input group -->
								</div><!-- /.form group -->

								<!-- Confirmation Password -->
								<div id="password_confirmation" class="form-group col-md-12">
									<div class="input-group col-md-12">
										<div class="input-group-addon">
											<i class="fa fa-lock"></i>
										</div>
										<?= Form::password( 'password_confirmation', array(
											'class'       => 'form-control',
											'placeholder' => _( 'Password Confirmation' )
										) ) ?>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								<div class="clearfix"></div>
							</div><!-- /.box-body -->
							<div class="box-footer" style="display: none;">
								<?= Form::submit( _( 'Update' ), array( 'class' => 'btn btn-primary pull-right' ) ) ?>
								<div class="clearfix"></div>
							</div><!-- /.box-footer-->
							<?= Form::close() ?>
						</div><!-- /#updatePassword -->
					</div>
				</section><!-- /.col-md-3 -->
			<?php endif; ?>
		</div><!-- /.row -->
	</section><!-- /.content -->
</aside><!-- /.right-side -->