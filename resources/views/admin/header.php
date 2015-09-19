<!-- header logo: style can be found in header.less -->
<header class="main-header">
	<!-- Add the class icon to your logo image or logo icon to add the margining -->
	<?= link_to_action( 'HomeController@getIndex', Option::getOption( 'siteName' ), '', array( 'class' => 'logo' ) ) ?>

	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- todo bu kısım silinip yerine mail kutusundaki okunmamış mesaj sayısını belirten ikon gelecek-->
				<?php if(userCan('manageContact')): ?>
					<!-- Messages: style can be found in dropdown.less-->
					<li class="dropdown messages-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-envelope-o"></i>
							<span class="label label-success">4</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">You have 4 messages</li>
							<li>
								<!-- inner menu: contains the actual data -->
								<ul class="menu">
									<li><!-- start message -->
										<a href="#">
											<div class="pull-left">
												<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
											</div>
											<h4>
												Support Team
												<small><i class="fa fa-clock-o"></i> 5 mins</small>
											</h4>
											<p>Why not buy a new awesome theme?</p>
										</a>
									</li><!-- end message -->
									<li>
										<a href="#">
											<div class="pull-left">
												<img src="dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
											</div>
											<h4>
												AdminLTE Design Team
												<small><i class="fa fa-clock-o"></i> 2 hours</small>
											</h4>
											<p>Why not buy a new awesome theme?</p>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="pull-left">
												<img src="dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
											</div>
											<h4>
												Developers
												<small><i class="fa fa-clock-o"></i> Today</small>
											</h4>
											<p>Why not buy a new awesome theme?</p>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="pull-left">
												<img src="dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
											</div>
											<h4>
												Sales Department
												<small><i class="fa fa-clock-o"></i> Yesterday</small>
											</h4>
											<p>Why not buy a new awesome theme?</p>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="pull-left">
												<img src="dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
											</div>
											<h4>
												Reviewers
												<small><i class="fa fa-clock-o"></i> 2 days</small>
											</h4>
											<p>Why not buy a new awesome theme?</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="footer"><a href="#">See All Messages</a></li>
						</ul>
					</li>
				<?php endif; ?>
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i>
						<span>
							<?php if ( Auth::user()->name == '' ):
								echo Auth::user()->username;
							else:
								echo Auth::user()->name . ' ' . Auth::user()->lastName;
							endif?> <i class="caret"></i></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image todo usermeta tablosu  ile resim gösterilecek ve gravatar varsa gravatar gözükecek -->
						<li class="user-header bg-light-blue">
							<?= Html::image( Auth::user()->getAvatarUrl(), 'User Image', array( 'class' => 'img-circle' ) ) ?>
							<p>
								<?= Auth::user()->username ?> - Web Developer <!-- todo user meta tablosu ile kullanıcı ünvanı gelecek -->
								<small><!--todo  bu tarih Ocak 2015 şeklinde yazılabilir--><?php printf(_('Member since %s'), Auth::user()->created_at->year) ?></small>
							</p>
						</li>
						<!-- Menu Body -->

						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<?= link_to_action( 'AdminController@getProfile', _( 'Profile' ), '', array( 'class' => 'btn btn-default btn-flat' ) ) ?>
							</div>
							<div class="pull-right">
								<?= link_to_action( 'AdminController@getLogout', _( 'Sign out' ), '', array( 'class' => 'btn btn-default btn-flat' ) ) ?>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>