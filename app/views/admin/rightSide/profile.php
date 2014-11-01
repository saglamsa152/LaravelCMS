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
							'class'  => 'ajaxForm form-horizontal',
							'action' => 'AdminController@postUpdateUser',
							'method' => 'post'
					) )?>
					<?=Form::hidden('id',$user->id)?>
					<h4 class="page-header"><?= _( 'Personal Information' ) ?></h4>
					<!-- Username -->
					<div class="form-group col-md-6">
						<?= Form::label( 'username', _( 'User Name :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<?= Form::text( 'username',$user->username, array( 'class' => 'form-control ' ) ) ?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

					<!-- Role -->
					<div class="form-group col-md-6">
						<?= Form::label( 'role', _( 'User Role :' ), array( 'class' => 'control-label col-md-4' ) ) ?>
						<div class="input-group col-md-8">
							<?= Form::select('role',User::getRoles(),$user->role,array( 'class' => 'form-control ' ))?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

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
							<?= Form::select( 'meta[city]', unserialize(Option::getOption('cities')), $user->city, array( 'class' => 'form-control ','data'=>'cities' ) ) ?>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

					<!-- Counties -->
					<?php
					$counties = unserialize( Option::getOption( 'counties' ) );
					asort($counties[$user->city]);
					$counties = $counties[$user->city];
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
							<li class="active"><a data-toggle="tab" href="#view"><?= _( 'View' ) ?></a></li>
							<li><a data-toggle="tab" href="#upload"><i class="fa fa-cloud-upload"></i> </a></li>
							<li class="pull-left header"><?= _( 'Avatar' ) ?></li>
						</ul>
						<div class="tab-content">
							<div id="view" class="tab-pane active">
								<?= HTML::image( get_gravatar( $user->email, 150 ), 'User Image', array( 'class' => 'img-circle  center-block' ) ) ?>
							</div><!-- /#view .tab-pane -->
							<div id="upload" class="tab-pane">
								<!-- todo avatar yükleme sayfası-->
								henüz hazır değil
							</div><!-- /#upload .tab-pane -->
						</div><!-- /.tab-content -->
					</div><!-- /.nav-tabs-custom -->
				</section><!-- /.col-md-3 -->
			</div>

		</div>
	</section>
	<!-- /.content -->
</aside><!-- /.right-side -->