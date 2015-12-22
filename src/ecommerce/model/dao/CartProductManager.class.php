<?php
	namespace ecommerce\model\dao;
	use ecommerce\model\CartProduct;
	use ecommerce\model\dao\ProductManager;

	class CartProductManager{

		public static function addProduct($id){
			if(!isset($_SESSION["cart"])){
				$_SESSION["cart"] = [];
			}
			$product = ProductManager::getProduct($id);
			$cartProduct = new CartProduct($product, 1);

			if(array_key_exists($cartProduct->getId(),$_SESSION["cart"])){
				$quantity = $_SESSION["cart"][$cartProduct->getId()]->getQuantity();
				$_SESSION["cart"][$cartProduct->getId()]->setQuantity($quantity+1);
			}else{
				$_SESSION["cart"][$cartProduct->getId()] = $cartProduct;
			}
		}

		public static function decreaseQuantity($id){
			$quantity = $_SESSION["cart"][$id]->getQuantity();
			if($quantity > 1){
				$_SESSION["cart"][$id]->setQuantity($quantity-1);
			}else{
				self::removeProduct($id);
			}
		}

		public static function removeProduct($id){
			unset($_SESSION["cart"][$id]);
		}

		public static function clearCart(){
			unset($_SESSION["cart"]);
		}

		public static function getTotalQuantity(){
			$totalQuantity = 0;
			if(isset($_SESSION["cart"])){
				foreach($_SESSION["cart"] as $product){
					$totalQuantity += $product->getQuantity();
				}
			}
			return $totalQuantity;
		}
	}
