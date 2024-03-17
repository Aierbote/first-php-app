<?php


class Context
{
	// Properties
	private static $cart = array();
	private static $paid = false;
	private static $products = NULL;
	private static $loading = false;
	private static $error = "";
	private static $counterInCart = 0;
	private static $total = 0;
	private static $detailProduct = (object) []; // TODO : NOTE : IDK maybe it could be a "object literal" like in js

	public function __construct()
	{
		$this->cart = array();
		$this->paid = false;
		$this->products = NULL;
		$this->loading = false;
		$this->error = "";
		$this->counterInCart = 0;
		$this->total = 0;

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
		$this->counterInCart = $this->counterInCart - 1;
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

	public function getProduct()
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
			", detailProduct=" .
			$this->detailProduct .
			")";
	}
};

$myContext = new Context();


echo " DEBUG : Context \n";
echo $myContext->repr();
