<?php if($orders == null){ ?>
	<h2>Vous n'avez pas de commande</h2>
<?php }else{ ?>
		<ul>
			<?php foreach($orders as $order){ ?>
				<li>
					<a href="index.php?controller=Front&method=orderDetail&id=<?php echo $order->getId(); ?>">
						N° de commande (<?php echo $order->getId(); ?>) - <?php echo $order->getDate(); ?>
					</a>
				</li>
			<?php } ?>
		</ul>
<?php } ?>
