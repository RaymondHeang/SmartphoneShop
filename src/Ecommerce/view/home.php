<?php if(isset($_SESSION["firstname"])){ ?>
	<p>Connecté en tant que <?php echo $_SESSION["firstname"] ?></p>
	<a href="index.php?controller=Front&method=disconnect">Deconnexion</a>
<?php } ?>
<div id="content">
	<h2>Notre selection</h2>
	<ul class="row">
		<?php foreach($randoms as $random){ ?>
			<li class="col-md-4">
				<a href="index.php?controller=Front&method=product&id=<?php echo $products[$random]->getId() ?>">
					<div class="random text-center">
						<img src="img/<?php echo $products[$random]->getImages()[0]; ?>">
						<p class="text-center">
							<?php echo $products[$random]->getName(); ?><br>
							<?php echo $products[$random]->getPrice(); ?>€
						</p>
					</div>
				</a>
			</li>
		<?php } ?>
	</ul>
	<h2>Tous nos produits</h2>
	<div class="produits">
		<ul>
			<?php foreach($products as $product){ ?>
				<li><a href="index.php?controller=Front&method=product&id=<?php echo $product->getId() ?>"><?php echo $product->getName(); ?></a></li>
			<?php } ?>
		</ul>
	</div>
</div>
