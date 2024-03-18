<?php

$app = require("Context.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
	<meta name="author" content="Alberto Cangialosi" />
	<link rel="stylesheet" href="style.css" />
	<script defer type="module" src="products.js"></script>
	<script>
		function notImplemented() {
			alert("Not implemented yet");
		}
	</script>

	<!-- NOTE : Moved down here because `defer` doesn't seems enough -->
</head>

<body>
	<nav>
		<ul>
			<li>
				<a href="/">Home</a>
			</li>
			<li>
				<a href="/cart.html">Cart</a>
			</li>
		</ul>
		<div>
			<button>
				<a href="cart.html">Cart</a>
			</button>
		</div>
	</nav>

	<h1>Home</h1>
	<h2>Our Products</h2>
	<main class="gridStyle">
		<!-- sample card -->

		<!-- <div class="cardStyle">
			<figure>
				<img src="https://via.placeholder.com/150" alt="Product 1" />
			</figure>
			<h3>Product 1</h3>
			<p>
				Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro,
				laborum.
			</p>
			<div class="priceShelf">
				<p>
					<b>Price: 10.0€</b>
				</p>
				<p>
					<b>In stock: 10</b>
				</p>
				<button>Product details</button>
				<button>Add To Cart</button>
			</div>
		</div>
		-->

		<?php

		foreach ($products as $product) {
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
					<button>Add To Cart</button>
				</div>
			</div>
		<?php
		}

		?>

	</main>
</body>

</html>