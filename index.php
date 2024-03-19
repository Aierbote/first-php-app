<?php

session_start();

$context = require("Context.php");
$app = new Context();

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
					<!-- FIXME : con parametro, ma no eseguibile -->
					<button onclick="<?php echo '$app->addToCart(' . $product->id . ')'; ?>">Add To Cart</button>
				</div>
			</div>
		<?php

		}

		?>

	</main>
</body>

</html>