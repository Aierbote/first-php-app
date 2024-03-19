<?php

session_start();

unset($_SESSION["cart"]);

$cart = (array) unserialize($_SESSION["cart"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="style.css" />
	<title>Document</title>
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
				<a href="./cart.php">Cart <?php echo count($cart) ?></a>
			</button>
		</div>
	</nav>
</body>

</html>