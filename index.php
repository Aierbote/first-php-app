<?php

session_start();

$context = require("Context.php");
$app = new Context();

if (isset($_POST["idProduct"])) {
	$app->addToCart($_POST["idProduct"]);

	$_SESSION["cart"] = serialize($app->cart);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
	<meta name="author" content="Alberto Cangialosi" />
	<link rel="stylesheet" href="style.css" />
	<script>
		function notImplemented() {
			alert("Not implemented yet");
		}
	</script>
</head>

<body>
	<nav>
		<ul>
			<li>
				<a href="./index.php">Home</a>
			</li>
			<li>
				<a href="./cart.php">Cart</a>
			</li>
		</ul>
		<div>
			<button>
				<a href="./cart.php">Cart</a>
			</button>
		</div>
	</nav>

	<h1>Home</h1>
	<h2>Our Products</h2>
	<main class="gridStyle">
		<?php

		foreach ($app->products as $product) {

		?>
			<div class="cardStyle">
				<figure>
					<img src="<?php echo $product->thumbnail; ?>" alt="<?php echo $product->title; ?>" />
				</figure>
				<h3><?php echo $product->title; ?></h3>
				<p>
					<?php echo $product->description; ?>
				</p>
				<div class="priceShelf">
					<p>
						<b>Price: <?php echo $product->price; ?>€</b>
					</p>
					<p>
						<b>In stock: <?php echo $product->qty; ?></b>
					</p>
					<button>Product details</button>

					<button class="addToCartButton" data-idProduct="<?php echo $product->id; ?>" onclick=>Add To Cart</button>

				</div>
			</div>
		<?php

		}

		?>

	</main>
</body>

<script>
	document.addEventListener("DOMContentLoaded", () => {
		const addToCartButtons = document.querySelectorAll(".addToCartButton");

		// funzione lato client per inviare una richiesta POST al server
		addToCartButtons.forEach(
			(button) => {
				button.addEventListener("click", (event) => {
					const idProduct = event.target.getAttribute("data-idProduct");

					fetch("index.php", {
							method: "POST",
							headers: {
								"Content-Type": "application/x-www-form-urlencoded",
							},
							body: "idProduct=" + idProduct,
						})
						.then((response) => {
							console.log(`Hnadling product added to cart: ${response.ok}`);
						})
						.catch((error) => {
							console.error(`Error during handling product added to cart ${error}`);
						});
				});
			});
	})
</script>

</html>