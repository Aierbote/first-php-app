<?php


class Context
{
	// Properties
	public static $cart = array();
	public static $paid = false;
	public static $products = NULL;
	public static $loading = false;
	public static $error = "";
	public static $counterInCart = 0;
	public static $total = 0;
	// FIXME : this cause a 500 error
	// private static $detailProduct = (object) ; // TODO : NOTE : IDK maybe it could be a "object literal" like in js

	public function __construct()
	{
		$this->cart = array();
		$this->paid = false;
		$this->products = NULL;
		$this->loading = false;
		$this->error = "";
		$this->counterInCart = 0;
		$this->total = 0;

		// initialize products with the call to API
		$this->getProducts();


		# NOTE : associative array casted into an object, closest to a object literal in js
		// $this->detailProduct = (object) [
		// 	"qty"-> ,
		// 	"userId"-> ,
		// 	"title"-> ,
		// 	"description"-> ,
		// 	"id"-> ,
		// 	"price"-> ,
		// 	"image"-> ,
		// 	"thumbnail"-> ,
		// ];

	}

	// Methods
	public function getProducts()
	{
		$url = "https://mockend.up.railway.app/api/products/";
		$this->loading = true;

		$response = file_get_contents($url);
		$data = json_decode($response, false);

		if ($data == NULL) {
			$this->error = "Error loading products";
			$this->loading = false;
			return;
		}

		$this->products = $data;
		$this->loading = false;
	}

	public function addToCart($idProduct)
	{
		$found = false;

		$this->counterInCart = $this->counterInCart + 1;
		foreach ($this->cart as $key => $cartItem) {
			if ($cartItem->id == $idProduct) {
				$cartItem->qty = $cartItem->qty + 1;
				$found = true;
				break;
			}
		}

		if ($found != true) {
			array_push($this->cart[], (object) ["qty" => 1, "id" => $idProduct]);
		}
		return null;
	}

	public function removeFromCart()
	{
		return null;
	}

	public function removeTheseFromCart()
	{
		return null;
	}

	public function pay()
	{
		return null;
	}

	public function done()
	{
		return null;
	}

	public function getProductQuantity()
	{
		return null;
	}


	public function repr()
	{
		return "Context(cart=" .
			$this->cart .
			", paid=" .
			$this->paid .
			", products=" .
			$this->products .
			", loading=" .
			$this->loading .
			", error=" .
			$this->error .
			", counterInCart=" .
			$this->counterInCart .
			", total=" .
			$this->total .
			// // FIXME : this cause a 500 error
			// ", detailProduct=" .
			// $this->detailProduct .
			")";
	}
};
