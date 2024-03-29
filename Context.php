<?php

session_start();

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
		if (isset($_SESSION["products"])) {
			$this->products = $_SESSION["products"];
		} else {
			$this->fetchProducts();
			$_SESSION["products"] = $this->products;
		}

		// initialize cart with saved data
		if (isset($_SESSION["products"])) {
			$this->products = $_SESSION["products"];
		} else {
			$this->fetchProducts();
			$_SESSION["products"] = $this->products;
		}

		// initialize cart with saved data
		if (isset($_SESSION["products"])) {
			$this->products = $_SESSION["products"];
		} else {
			$this->fetchProducts();
			$_SESSION["products"] = $this->products;
		}


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
	public function fetchProducts()
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
				$cartItem->qty++;
				$found = true;

				break;
			}
		}

		if (!$found) {
			$cartItem = (object) ["qty" => 1, "id" => $idProduct];

			$this->cart[] = $cartItem;
		}

		$this->total = $this->total + $cartItem->price;
		return null;
	}

	public function removeFromCart($idProduct)
	{
		$this->counterInCart = $this->counterInCart - 1;
		foreach ($this->cart as $key => $cartItem) {
			if ($cartItem->id == $idProduct) {
				$cartItem->qty = $cartItem->qty - 1;
				$this->counterInCart = $this->counterInCart - 1;

				if ($cartItem->qty == 0) {
					unset($this->cart[$key]);
				}

				$this->total = $this->total - $cartItem->price;
				break;
			}
		}
		return null;
	}

	public function removeTheseFromCart($idProduct)
	{
		foreach ($this->cart as $key => $cartItem) {
			if ($cartItem->id == $idProduct) {
				$this->counterInCart = $this->counterInCart - $cartItem->qty;
				unset($this->cart[$key]);

				$this->total = $this->total - ($cartItem->price * $cartItem->qty);
				break;
			}
		}
		return null;
	}

	public function pay($bool)
	{
		$this->paid = $bool;
		return null;
	}

	public function done()
	{
		$this->pay(false);
		$this->counterInCart = 0;
		$this->cart = array();
		$this->total = 0;
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
