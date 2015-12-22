<form method="post">
	<legend>Connexion</legend>
	<div>
		<label>Mail : </label>
		<input type="text" name="mail">
	</div>
	<div>
		<label>Mot de passe : </label>
		<input type="text" name="pwd">
	</div>
	<input type="submit" name="connect" value="Connexion">
	<a href="index.php?controller=Front&method=subscribe">S'incrire</a>
</form>

<?php if($this->message != ''){ echo $this->message; } ?>