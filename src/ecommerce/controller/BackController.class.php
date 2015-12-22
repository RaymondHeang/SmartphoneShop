<?php

	namespace ecommerce\controller;
	use ecommerce\model\dao\OrderManager;
	use ecommerce\model\dao\ProductManager;

	class BackController{
		public function managementAction(){
			if(isset($_SESSION["user"]) && $_SESSION["user"]->getRole() == 1){
				require 'src/ecommerce/view/back/management.php';
			}else{
				header('Location: index.php');
			}
		}

		public function allOrderAction(){
			$orders = OrderManager::getAllOrder();
			require 'src/ecommerce/view/back/allorder.php';
		}

		public function addProductAction(){
			if(array_key_exists("add", $_POST)){
				if(!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["price"])){
					ProductManager::addProduct($_POST["name"], $_POST["description"], $_POST["price"]);
					header("Location: index.php?controller=Back&method=management");
				}else{
					echo "champs incomplets";
				}
			}
			require 'src/ecommerce/view/back/addproduct.php';
		}

		public function allProductAction(){
			$products = ProductManager::getProducts();
			require 'src/ecommerce/view/back/allproduct.php';
		}

		public function deleteProductAction(){
			if(isset($_GET["id"])){
				ProductManager::deleteProduct($_GET["id"]);	
			}
			$this->allProductAction();
		}

		public function updateProductAction(){
			if(isset($_GET["id"])){
				$product = ProductManager::getProduct($_GET["id"]);
			}

			require "src/ecommerce/view/back/updateproduct.php";

			if(isset($_POST["update"])){
				if(!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["price"])){
					ProductManager::updateProduct($_POST["id"], $_POST["name"], $_POST["description"], $_POST["price"]);
					header("Location: index.php?controller=Back&method=management");	
				}else{
					echo "champs incomplets";
				}
			}
		}
	}