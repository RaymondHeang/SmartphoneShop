<?php
	namespace Ecommerce\Model\DAO;

	use Ecommerce\Model\Order;
	use Ecommerce\Model\DAO\DBOperation;

	class OrderManager
	{
		public static function setOrder(Order $order)
		{
			$query = "INSERT INTO commandes (prix, id_user)
			VALUES ('".$order->getPrice()."','".$order->getIdUser()."')";
			DBOperation::exec($query);
			$lastId = DBOperation::getLastId();
			foreach($_SESSION["cart"] as $product) {
				$query = "INSERT INTO produits_commandes (id_produit, id_commande, quantity)
				VALUES ('".$product->getId()."','".$lastId."','".$product->getQuantity()."')";
				DBOperation::exec($query);
			}
		}

		public static function getOrders($id_user)
		{
			$query = "SELECT * FROM commandes
			WHERE id_user=".$id_user;
			$results = DBOperation::getAll($query);
			$orders = [];

			foreach ($results as $result) {
				$orders[] = new Order($result["prix"], $result["id_user"], $result["id"], $result["date"]);
			}
			return $orders;
		}

		public static function getOrderDetail($id)
		{
			$query = "SELECT nom, date, quantity, produits.prix AS prix, commandes.prix AS total FROM commandes
			JOIN produits_commandes ON commandes.id=produits_commandes.id_commande
			JOIN produits ON produits.id=produits_commandes.id_produit
			WHERE commandes.id=".$id;

			$result = DBOperation::getAll($query);
			return $result;
		}

		public static function getAllOrder()
		{
			$query = "SELECT * FROM commandes";
			$result = DBOperation::getAll($query);
			$orders = [];

			foreach ($result as $order) {
				$orders[] = new Order($order['prix'], $order['id_user'], $order['id'], $order['date']);
			}

			return $orders;
		}
	}
