<form method="post">
	<legend>Modifier un produit</legend>
	<div>
		<label>Nom : </label>
		<input type="text" name="name" value="<?php echo $product->getName(); ?>">
	</div>
	<div>
		<label>Description : </label>
		<textarea name="description" cols="30"><?php echo $product->getDescription(); ?></textarea>
	</div>
	<div>
		<label>Prix : </label>
		<input type="text" name="price" value="<?php echo $product->getPrice(); ?>"> €
	</div>
	<input type="hidden" name="id" value="<?php echo $product->getId(); ?>">
	<input type="submit" name="update" value="Enregistrer">
</form>