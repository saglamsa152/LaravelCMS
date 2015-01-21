<!-- header logo: style can be found in header.less -->
<header class="header">
	<!-- Add the class icon to your logo image or logo icon to add the margining -->
	<?= link_to_action( 'HomeController@getIndex', Option::getOption( 'siteName' ), '', array( 'class' => 'logo' ) ) ?>

	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<?php if(userCan('manageContact')): ?>
				<!-- Messages: style can be found in dropdown.less-->
				<li class="dropdown messages-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope"></i>
						<span class="label label-success"><?=$contacts->where('isRead','=',false)->count()?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="header"><?php printf(_('You have %s messages'),$contacts->where('isRead','=',false)->count())?></li>
						<li><!-- inner menu: contains the actual data -->

							<ul class="menu">
								<?php	foreach ( $contacts->where('isRead','=',false)->get() as $contact ):
									$contact->meta=unserialize($contact->meta); // veritabanındaki bilgiyi diziye döndirmek için?>
								<li><!-- start message -->
									<a href="#" class="clickToRead" data-value='{"id":"<?= $contact->id ?>","name":"<?= trim($contact->meta['name']) ?>","content":"<?= addslashes(trim($contact->message)) ?>"}'>
										<h4>
											<?= $contact->meta['name'] ?>
										</h4>
										<p><?= mb_substr( $contact->message, 0, 50, 'UTF-8' ).'...' ?></p>
									</a>
								</li><!-- end message -->
								<?php endforeach; ?>
							</ul>
						</li>
						<li class="footer"><a href="<?=URL::action('AdminController@getContacts')?>"><?= _('See All Messages')?></a></li>
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
							<?= HTML::image( Auth::user()->getAvatarUrl(), 'User Image', array( 'class' => 'img-circle' ) ) ?>
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