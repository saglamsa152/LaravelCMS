<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $title ?>
			<small>advanced tables</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::action( 'AdminController@getIndex' ) ?>"><i class="fa fa-dashboard"></i> <?=_('Home')?></a></li>
			<li><a href="<?= URL::action( 'AdminController@getMailbox' ) ?>"><?= _( 'Mailbox' ) ?></a></li>
			<li class="active"><?= _( 'Inbox' ) ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<iframe class="mailIframe" src="https://mail.gencbilisim.net"></iframe>
	<!-- todo adres düzenlenecek -->
	<script type="text/javascript">
		$(function(){
			$('.mailIframe').height(window.innerHeight-($('.content-header').outerHeight()+$('.navbar').outerHeight()+5));
		});
	</script>
</aside><!-- /.right-side -->


