<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<?= HTML::image( Auth::user()->getAvatarUrl(), 'User Image', array( 'class' => 'img-circle' ) ) ?>
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
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search..." />
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat">
																	<i class="fa fa-search"></i></button>
                            </span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<!-- Dashboard -->
			<li class="<?php if(str_contains(URL::current(),'/index')) echo ' active'?>">
				<a href="<?=URL::action('AdminController@getIndex')?>">
					<i class="fa fa-dashboard"></i> <span><?=_('Dashboard')?></span>
				</a>
			</li>
			<!-- /Dashboard -->
			<!-- Users or Profile -->
			<?php if(userCan('manageUsers')):?>
			<li class="treeview <?php if(str_contains(URL::current(),'user')) echo ' active'?>">
				<a href="">
					<i class="fa fa-users"></i>
					<span><?=_('Users')?></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?=URL::action('AdminController@getUsers')?>"><i class="fa fa-list"></i> <?=_('List')?></a></li>
					<li><a href="<?=URL::action('AdminController@getAddUser')?>"><i class="fa fa-plus"></i> <?=_('Add New')?></a></li>
				</ul>
			</li>
			<?php else: ?>
				<li class="<?php if(str_contains(URL::current(),'/profile')) echo ' active'?>">
					<a href="<?=URL::action('AdminController@getProfile')?>">
						<i class="fa fa-user"></i> <span><?=_('Profile')?></span>
					</a>
				</li>
			<?php endif; ?>
			<!-- /Users or Profile-->
			<!-- News -->
			<li class="treeview <?php if(str_contains(URL::current(),'news')) echo ' active'?>">
				<a href="">
					<i class="fa  fa-laptop"></i>
					<span><?=_('News')?></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?=URL::action('AdminController@getNews')?>"><i class="fa fa-list"></i> <?=_('List')?></a></li>
					<li><a href="<?=URL::action('AdminController@getAddNews')?>"><i class="fa fa-plus"></i> <?=_('Add New')?></a></li>
				</ul>
			</li>
			<!-- /News -->
			<!-- Slider -->
			<li class="treeview <?php if(str_contains(URL::current(),'slider')) echo ' active'?>">
				<a href="">
					<i class="fa fa-ellipsis-h"></i>
					<span><?=_('Slider')?></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?=URL::action('AdminController@getSlider')?>"><i class="fa fa-list"></i> <?=_('List')?></a></li>
					<li><a href="<?=URL::action('AdminController@getAddSlide')?>"><i class="fa fa-plus"></i> <?=_('Add New')?></a></li>
				</ul>
			</li>
			<!-- /Slider -->
			<!-- Product -->
			<li class="treeview <?php if(str_contains(URL::current(),'product')) echo ' active'?>">
				<a href="">
					<i class="fa fa-shopping-cart"></i>
					<span><?=_('Products')?></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?=URL::action('AdminController@getProducts')?>"><i class="fa fa-list"></i> <?=_('List')?></a></li>
					<li><a href="<?=URL::action('AdminController@getAddProduct')?>"><i class="fa fa-plus"></i> <?=_('Add New')?></a></li>
				</ul>
			</li>
			<!-- /Product -->
			<!-- Services -->
			<li class="treeview <?php if(str_contains(URL::current(),'service')) echo ' active'?>">
				<a href="">
					<i class="fa  fa-globe"></i>
					<span><?=_('Services')?></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?=URL::action('AdminController@getServices')?>"><i class="fa fa-list"></i> <?=_('List')?></a></li>
					<li><a href="<?=URL::action('AdminController@getAddService')?>"><i class="fa fa-plus"></i> <?=_('Add New')?></a></li>
				</ul>
			</li>
			<!-- /Services -->
			<!-- Orders -->
			<li class="treeview <?php if(str_contains(URL::current(),'order')) echo ' active'?>">
				<a href="">
					<i class="fa fa-credit-card"></i>
					<span><?=_('Orders')?></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?=URL::action('AdminController@getOrders')?>"><i class="fa fa-list"></i> <?=_('List')?></a></li>
				</ul>
			</li>
			<!-- /Orders -->
			<!-- Contact -->
			<li class="treeview <?php if(str_contains(URL::current(),'contact')) echo ' active'?>">
				<a href="">
					<i class="fa fa-envelope"></i>
					<span><?=_('Contact')?></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?=URL::action('AdminController@getContacts')?>"><i class="fa fa-inbox"></i> <?=_('İnbox')?></a></li>
				</ul>
			</li>
			<!-- /Contact -->
			<!-- Options -->
			<li class="treeview <?php if(str_contains(URL::current(),'options')) echo ' active'?>">
				<a href="">
					<i class="fa  fa-cogs"></i>
					<span><?=_('Options')?></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?=URL::action('OptionsController@getIndex')?>"><i class="fa fa-angle-double-right"></i> <?=_('General')?></a></li>
				</ul>
			</li>
			<!-- /Options -->
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>