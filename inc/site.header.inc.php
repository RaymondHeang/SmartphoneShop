<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Smartphone Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fa/css/font-awesome.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
</head>
<body>
	<header>
        <div class="container">
    		<a href="index.php"><i class="fa fa-home"></i> Accueil</a> |
    		<a href="index.php?controller=Front&method=membre">Mon compte</a> |
            <a href="index.php?controller=Front&method=cart"><i class="fa fa-shopping-cart"></i> Panier (<?php echo \ecommerce\model\dao\CartProductManager::getTotalQuantity(); ?>)</a>
        </div>
	</header>
	<div class="container">
    	<div class="content">
            <h1 class="text-center">Smartphone Shop</h1>