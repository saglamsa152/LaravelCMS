<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<?= HTML::image( 'assets/admin/img/avatar3.png', 'User Image', array( 'class' => 'img-circle' ) ) ?>
			</div>
			<div class="pull-left info">
				<p><?=_('Hello')?> , <?php if (Auth::user()->name==''):
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
			<li class="<?php if(str_contains(URL::current(),'/index')) echo ' active'?>">
				<a href="<?=URL::action('AdminController@getIndex')?>">
					<i class="fa fa-dashboard"></i> <span><?=_('Dashboard')?></span>
				</a>
			</li>
			<li class="treeview <?php if(str_contains(URL::current(),'/news')) echo ' active'?>">
				<a href="">
					<i class="fa fa-bar-chart-o"></i>
					<span><?=_('News')?></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?=URL::action('AdminController@getNews')?>"><i class="fa fa-angle-double-right"></i> <?=_('List')?></a></li>
					<li><a href="#"><i class="fa fa-angle-double-right"></i> <?=_('Add New')?></a></li>
				</ul>
			</li>
			<li class="treeview <?php if(str_contains(URL::current(),'/options')) echo ' active'?>">
				<a href="">
					<i class="fa fa-bar-chart-o"></i>
					<span><?=_('Options')?></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?=URL::action('OptionsController@getIndex')?>"><i class="fa fa-angle-double-right"></i> <?=_('General')?></a></li>
				</ul>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>