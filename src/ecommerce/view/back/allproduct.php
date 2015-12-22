<ul>
<?php foreach($products as $product) { ?>
	<li>
		<?php echo $product->getName(); ?> -
		<a href="index.php?controller=Back&method=updateProduct&id=<?php echo $product->getId(); ?>">Modifier</a> -
		<a href="index.php?controller=Back&method=deleteProduct&id=<?php echo $product->getId(); ?>">Supprimer</a>
	</li>
<?php } ?>
</ul>
