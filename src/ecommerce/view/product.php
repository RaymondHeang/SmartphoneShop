<h2><?php echo $product->getName(); ?></h2>
<div class="images row text-center">
	<?php foreach($product->getImages() as $image){ ?>
		<img src="img/<?php echo $image; ?>" class="col-md-4">
	<?php } ?>
</div>
<div class="description row">
    <div class="col-md-6 col-md-offset-2">
        <p><?php echo $product->getDescription() ?></p>
    </div>
    <div class="col-md-2">
        <p class="price"><?php echo $product->getPrice() ?>€</p>
        <a href="index.php?controller=Front&method=addToCart&id=<?php echo $product->getId(); ?>">Ajouter <i class="fa fa-shopping-cart"></i></a>
    </div>
</div>
