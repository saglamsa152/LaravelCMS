<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 13.02.2014
 * Time: 23:19
 * Temaya uygun sayfalama
 */

?>

<?php if ( $paginator->getLastPage() > 1 ): ?>
	<ul class="nav">
		<li>
			<a href="<?php echo $paginator->getUrl( $paginator->getCurrentPage() - 1 ); ?> ">«</a>
		</li>
		<?php for ( $i=1; $i <= $paginator->getLastPage(); $i ++ ): ?>
			<li class="<?php if ( $i == $paginator->getCurrentPage() ) echo 'selected' ?>">
				<a href="<?= $paginator->getUrl( $i ) ?>"><?=$i?></a>
			</li>
		<?php endfor; ?>
		<li>
			<a href="<?= $paginator->getUrl( $paginator->getCurrentPage() + 1 ); ?> ">»</a>
		</li>

	</ul>
<?php endif; ?>
