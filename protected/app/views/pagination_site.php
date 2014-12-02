
<a href="<?php echo $paginator->getUrl(1) ?>">&laquo;</a>
	<?php for ($i=1; $i <= $paginator->getLastPage(); $i++): ?>
		<?php 
			if($i == $paginator->getCurrentPage())
			{
		?>
				<b><?php echo $i ?></b>
		<?php
			}else
			{
		?>
			<a href="<?php echo $paginator->getUrl($i) ?>"><?php echo $i ?></a>
		<?php
			}
		?>	
    <?php endfor ?>

<a href="<?php echo $paginator->getLastUrl() ?>">&raquo;</a>