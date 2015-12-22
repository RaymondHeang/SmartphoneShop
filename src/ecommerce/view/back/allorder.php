<?php foreach($orders as $order){ ?>
	<a href="index.php?controller=Front&method=orderDetail&id=<?php echo $order->getId(); ?>">
		<h4>
			Commande ID (<?php echo $order->getId(); ?>)
			 passée le <?php echo $order->getDate(); ?>
			 par Utilisateur <?php echo $order->getIdUser(); ?>
		</h4>
	</a>
<?php } ?>