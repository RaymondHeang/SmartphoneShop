<?php if($products == null){ ?>
	<h2>Panier vide</h2>
<?php }else{ ?>
<table class="table table-hover">
	<thead>
		<tr>
		    <th>Articles</th>
		    <th>Quantité</th>
		    <th>Prix</th>
		    <th><i class="fa fa-trash"></i></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($products as $product){ ?>
		<tr>
			<td>
				<a href="index.php?controller=Front&method=product&id=<?php echo $product->getId(); ?>"><?php echo $product->getName(); ?></a>
			</td>
			<td>
				<a href="index.php?controller=Front&method=decreaseQuantity&id=<?php echo $product->getId(); ?>"> - </a>
				<?php echo $product->getQuantity(); ?>
				<a href="index.php?controller=Front&method=addToCart&id=<?php echo $product->getId(); ?>"> + </a>
			</td>
			<td><?php echo $product->getTotal(); ?>€</td>
			<td>
				<a href="index.php?controler=Front&method=removeFromCart&id=<?php echo $product->getId(); ?>"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<p class="price total">Prix total : <?php echo $total ?>€</p>
<a href="index.php?controller=Front&method=clearCart">Vider le panier</a>
<form action="index.php?controller=Front&method=validOrder" method="post">
	<input type="submit" value="Valider votre commande">
	<input type="hidden" name="total" value="<?php echo $total ?>">
</form>
<?php }?>
