<?php

	namespace Ecommerce\Controller;

	use Ecommerce\Model\User;
	use Ecommerce\Model\Order;
	use Ecommerce\Model\Product;
	use Ecommerce\Model\CartProduct;
	use Ecommerce\Model\dao\UserManager;
	use Ecommerce\Model\dao\OrderManager;
	use Ecommerce\Model\dao\ProductManager;
	use Ecommerce\Model\dao\CartProductManager;

	class FrontController
	{

		protected $message = '';

		public function homeAction()
		{
		    $products = ProductManager::getProducts();
		    $randoms = ProductManager::getRandomProducts($products);
		    require 'src/Ecommerce/view/home.php';
		}

		public function signinAction()
		{
			if (array_key_exists("connect", $_POST)) {
				if ($_POST["mail"] && $_POST["pwd"]) {
					$user = new User(null, $_POST["mail"], $_POST["pwd"], false, null, null, null, null, null, null);
					$userLogin = UserManager::connect($user);

					if ($userLogin) {
						$_SESSION["user"] = $userLogin;
						header('Location: index.php?controller=Front&method=membre');
					} else {
						header('Location: index.php?controller=Front&method=signin&error1');
					}
				} else {
					header('Location: index.php?controller=Front&method=signin&error2');
				}
			}

			if (array_key_exists("error1", $_GET)) {
				$this->message = "Erreur d'authentification"."<br>";
			}

			if (array_key_exists("error2", $_GET)) {
				$this->message = "Champs incomplets"."<br>";
			}

			require 'src/Ecommerce/view/login.php';
		}

		public function membreAction()
		{
			if (isset($_SESSION["user"])) {
				require 'src/Ecommerce/view/membre.php';
			} else {
				$this->signinAction();
			}
		}

		public function subscribeAction()
		{
			/*require 'src/Ecommerce/view/subscribe.php';
			if(array_key_exists("subscribe", $_POST)){

				$user = new User("admin@Ecommerce.com", "root", true, "Admin", "Ecommerce", "1 rue de la Paix", "75", "PARIS", "0123456789", 1);
				UserManager::insert($user);

			}*/
		}

		public function disconnectAction()
		{
			unset($_SESSION["user"]);
			header("Location: index.php");
		}

		public function productAction()
		{
			if (isset($_GET['id']) && $product = ProductManager::getProduct($_GET['id'])) {
				require 'src/Ecommerce/view/product.php';
			} else {
				header('Location: index.php');
			}
		}

		public function cartAction()
		{
			$products = [];
			$total = 0;

			if (isset($_SESSION["cart"])) {
				foreach($_SESSION["cart"] as $product) {
					$total += $product->getTotal();
					$products[] = $product;
				}
			}

			require 'src/Ecommerce/view/cart.php';
		}

		public function addToCartAction()
		{
			if (isset($_GET['id']) && ProductManager::getProduct($_GET['id'])) {
				CartProductManager::addProduct($_GET['id']);
			} else {
				header('Location: index.php');
			}

			header('Location: index.php?controller=Front&method=cart');
		}

		public function decreaseQuantityAction()
		{
			if (isset($_GET['id']) && isset($_SESSION["cart"][$_GET['id']])) {
				CartProductManager::decreaseQuantity($_GET['id']);
				header('Location: index.php?controller=Front&method=cart');
			} else {
				header('Location: index.php');
			}
		}

		public function removeFromCartAction()
		{
			if (isset($_GET['id']) && isset($_SESSION["cart"][$_GET['id']])) {
				CartProductManager::removeProduct($_GET['id']);
				header('Location: index.php?controller=Front&method=cart');
			} else {
				header('Location: index.php');
			}
		}

		public function clearCartAction()
		{
			CartProductManager::clearCart();
			header('Location: index.php?controller=Front&method=cart');
		}

		public function validOrderAction()
		{
			if (isset($_SESSION["user"])) {
				if (isset($_SESSION["cart"]) && $_SESSION["cart"] != null) {
					$order = new Order($_POST["total"], $_SESSION["user"]->getId());
					OrderManager::setOrder($order);
					CartProductManager::clearCart();
					header('Location: index.php?controller=Front&method=membre');
				} else {
					header('Location: index.php');
				}
			} else {
				$this->signinAction();
			}
		}

		public function myOrderAction()
		{
			$orders = OrderManager::getOrders($_SESSION["user"]->getId());
			require 'src/Ecommerce/view/orders.php';
		}

		public function orderDetailAction()
		{
			if (isset($_GET["id"])) {
				$detail = OrderManager::getOrderDetail($_GET["id"]);
				require 'src/Ecommerce/view/orderdetail.php';
			} else {
				header('Location: index.php');
			}
		}

		public function aAction() //method used when we need to destroy session
		{
			session_destroy();
		}
	}
