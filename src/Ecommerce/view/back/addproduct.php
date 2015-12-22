<form method="post" enctype="multipart/form-data">
	<legend>Ajouter un produit</legend>
	<div>
		<label>Nom : </label>
		<input type="text" name="name">
	</div>
	<div>
		<label>Description : </label>
		<textarea name="description" cols="30"></textarea>
	</div>
	<div>
		<label>Prix : </label>
		<input type="text" name="price"> €
	</div>
	<input type="file" name="link">
	<input type="submit" name="add" value="Enregistrer">
</form>