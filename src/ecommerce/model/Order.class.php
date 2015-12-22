<?php
	namespace ecommerce\model;

	class Order{
		protected $id, $date, $price, $id_user;

		public function __construct($price, $id_user, $id=null, $date=null){
			$this->setId($id);
			$this->setDate($date);
			$this->setPrice($price);
			$this->setIdUser($id_user);
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getDate(){
			return $this->date;
		}

		public function setDate($date){
			$myDateTime = new \DateTime($date);
			$formatedDate = $myDateTime->format('d/m/Y à H:i');
			$this->date = str_replace(':', 'h', $formatedDate);
		}

		public function getPrice(){
			return $this->price;
		}

		public function setPrice($price){
			$this->price = $price;
		}

		public function getIdUser(){
			return $this->id_user;
		}

		public function setIdUser($id_user){
			$this->id_user = $id_user;
		}
	}
