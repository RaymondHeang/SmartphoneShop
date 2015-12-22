<?php 
	namespace ecommerce\model;
	use ecommerce\model\Product;

	class CartProduct extends Product{
		protected $quantity;

		public function __construct(Product $product, $quantity){
			$this->id = $product->getId();
			$this->name = $product->getName();
			$this->description = $product->getDescription();
			$this->price = $product->getPrice();
			$this->images = $product->getImages();
			$this->setQuantity($quantity);
		}

		public function getQuantity(){
			return $this->quantity;
		}

		public function setQuantity($quantity){
			$this->quantity = $quantity;
		}

		public function getTotal(){
			return $this->quantity * $this->price;
		}
	}