<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar sidebar-offcanvas">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<?= Html::image( Auth::user()->getAvatarUrl(), 'User Image', array( 'class' => 'img-circle' ) ) ?>
			</div>
			<div class="pull-left info">
				<p><?=_('Hello')?> </br> <?php if (Auth::user()->name==''):
						echo Auth::user()->username;
					else:
						echo Auth::user()->name . ' ' . Auth::user()->lastName;
					endif?></p>

				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<!-- Dashboard -->
			<?php if(userCan('viewDashboard')):?>
			<li class="<?php if(str_contains(URL::current(),'index') or str_contains(URL::current(),'') ) echo ' active'?>">
				<a href="<?=URL::action('AdminController@getIndex')?>">
					<i class="fa fa-dashboard"></i> <span><?=_('Dashboard')?></span>
				</a>
			</li>
			<?php endif?>
			<!-- /Dashboard -->
			<!-- Members or Profile -->
			<?php if(userCan('viewUsers')):?>
			<li class="treeview <?php if(str_contains(URL::current(),'user') and !str_contains(URL::current(),'preferences')) echo ' active'?>">
				<a href="">
					<i class="fa fa-users"></i>
					<span><?=_('Members')?></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?=URL::action('AdminController@getUsers')?>"><i class="fa fa-list"></i> <?=_('List')?></a></li>
					<?php if(userCan('addUser')): ?>
					<li><a href="<?=URL::action('AdminController@getAddUser')?>"><i class="fa fa-plus"></i> <?=_('Add New Member')?></a></li>
					<?php endif ?>
				</ul>
			</li>
			<?php else: ?>
				<li class="<?php if(str_contains(URL::current(),'/profile')) echo ' active'?>">
					<a href="<?=URL::action('AdminController@getProfile')?>">
						<i class="fa fa-user"></i> <span><?=_('Profile')?></span>
					</a>
				</li>
			<?php endif; ?>
			<!-- /Members or Profile-->
			<!-- News -->
			<?php if(userCan('manageNews')):?>
				<li class="treeview <?php if(str_contains(URL::current(),'news')) echo ' active'?>">
					<a href="">
						<i class="fa  fa-laptop"></i>
						<span><?=_('News')?></span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=URL::action('AdminController@getNews')?>"><i class="fa fa-list"></i> <?=_('List')?></a></li>
						<li><a href="<?=URL::action('AdminController@getAddNews')?>"><i class="fa fa-plus"></i> <?=_('Add New')?></a></li>
						<li><a href="<?=URL::action('AdminController@getNewsTrash')?>"><i class="fa fa-trash"></i> <?=_('Trash')?></a></li>
					</ul>
				</li>
			<?php endif; ?>
			<!-- /News -->
			<!-- Services -->
			<?php if ( userCan( 'manageService' ) ): ?>
				<li class="treeview <?php if(str_contains(URL::current(),'service')) echo ' active'?>">
					<a href="">
						<i class="fa  fa-globe"></i>
						<span><?= _( 'Services' ) ?></span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?= URL::action( 'AdminController@getService' ) ?>"><i class="fa fa-list"></i> <?= _( 'List' ) ?></a></li>
						<li><a href="<?= URL::action( 'AdminController@getAddService' ) ?>"><i class="fa fa-plus"></i> <?= _( 'Add New' ) ?></a></li>
						<li><a href="<?= URL::action( 'AdminController@getServiceTrash' )?>"><i class="fa fa-trash"></i> <?=_('Trash')?></a></li>
					</ul>
				</li>
			<?php endif; ?>
			<!-- /Services -->
			<!-- Slider -->
			<?php if(userCan('manageSlider')): ?>
				<li><a href="<?=URL::action('AdminController@getSlider')?>"><i class="fa fa-ellipsis-h <?php if(str_contains(URL::current(),'slider')) echo ' active'?>"></i> <?=_('Slider')?></a></li>
			<?php endif; ?>
			<!-- /Slider -->
			<!-- Contact -->
			<?php if(userCan('manageMailbox')): ?>
			<li class="treeview <?php if(str_contains(URL::current(),'mail')) echo ' active'?>">
				<a href="">
					<i class="fa fa-envelope"></i>
					<span><?=_('Mailbox')?></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?=URL::action('AdminController@getMailbox')?>"><i class="fa fa-inbox"></i> <?=_('Mailbox')?></a></li>
					<li><a href="<?=URL::action('AdminController@getMailSettings')?>"><i class="fa fa-cogs"></i> <?=_('Settings')?></a></li>
				</ul>
			</li>
			<?php endif; ?>
			<!-- /Contact -->
			<!-- Options -->
			<?php if(userCan('manageOptions')): ?>
				<li class="treeview <?php if(str_contains(URL::current(),'options')) echo ' active'?>">
					<a href="">
						<i class="fa  fa-cogs"></i>
						<span><?=_('Options')?></span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<?php if (userCan( 'manageGeneralOptions' )): ?>
							<li><a href="<?=URL::action('OptionsController@getIndex')?>"><i class="fa fa-angle-double-right"></i> <?=_('General')?></a></li>
						<?php endif ?>
						<li><a href="<?=URL::action('OptionsController@getUserPreferences')?>"><i class="fa fa-angle-double-right"></i> <?=_('Site Preferences')?></a></li>
						<li><a href="<?=URL::action('OptionsController@getPostOptions')?>"><i class="fa fa-angle-double-right"></i> <?=_('Post Options')?></a></li>
					</ul>
				</li>
			<?php endif; ?>
			<!-- /Options -->
		</ul>
	</section><!-- /.sidebar -->
</aside>