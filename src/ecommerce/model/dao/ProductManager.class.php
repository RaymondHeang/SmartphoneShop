<?php
	namespace Ecommerce\Model\DAO;

	use Ecommerce\Model\Product;
	use Ecommerce\Model\DAO\DBOperation;

	class ProductManager
	{
		public static function getProducts()
		{
			$query = "SELECT *, produits.id as id_produit FROM produits
					LEFT JOIN images on produits.id = images.id_produit
					WHERE deleted=0";
			$products = DBOperation::getAll($query);

			$results = [];
			foreach($products as $product) {
				if (!array_key_exists($product["id_produit"],$results)) {
					$results[$product["id_produit"]] =
					new Product($product["id_produit"], $product["nom"], $product["description"], $product["prix"]);
    			}
    			$results[$product["id_produit"]]->setImage($product["link"]);
			}

			return $results;
		}

		public static function getProduct($id)
		{
			$query = "SELECT *, produits.id as id_produit FROM produits
					LEFT JOIN images on produits.id=images.id_produit
					WHERE produits.id=".$id." AND deleted=0";

			if ($products = DBOperation::getAll($query)) {
				$result = null;
				foreach($products as $product) {
					if (!isset($result)) {
						$result = new Product($product["id_produit"], $product["nom"], $product["description"], $product["prix"]);
					}
					$result->setImage($product["link"]);
				}
				return $result;
			}

			return false;
		}

		public static function getRandomProducts($product)
		{
			return array_rand($product, 3);
		}

		public static function deleteProduct($id)
		{
			$query = "UPDATE produits SET deleted=1 WHERE id=".$id;
			DBOperation::exec($query);
		}

		public static function addProduct($name, $description, $price)
		{
			$query = "INSERT INTO produits (nom, description, prix)
			VALUES ('".$name."', '".$description."', '".$price."')";
			DBOperation::exec($query);

			$lastId = DBOperation::getLastId();

			$directory = ROOT."img/";
			$file = basename($_FILES['link']['name']);
			$extension = ".jpg";
			if (strrchr($_FILES['link']['name'], '.') == $extension) {
				if (!move_uploaded_file($_FILES['link']['tmp_name'], $directory . $file)) {
          			echo 'Failed...';
     			}
			}

			$query = "INSERT INTO images (link, id_produit)
			VALUES ('".$_FILES['link']['name']."', '".$lastId."')";
			DBOperation::exec($query);
		}

		public static function updateProduct($id, $name, $description, $price)
		{
			$query = "UPDATE produits
			SET nom ='".$name."', description='".$description."', prix='".$price.
			"' WHERE id=".$id;
			DBOperation::exec($query);
		}
	}
