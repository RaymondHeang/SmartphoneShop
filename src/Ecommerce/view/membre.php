<h2>Bienvenue <?php echo $_SESSION["user"]->getFirstname(); ?> </h2>
<a href="index.php?controller=Front&method=myOrder">Mes commandes</a> |
<?php if($_SESSION["user"]->getRole() == 1) { ?>
	<a href="index.php?controller=Back&method=management">Gestion admin</a> |
<?php } ?>
<a href="index.php?controller=Front&method=disconnect">Deconnexion</a>
