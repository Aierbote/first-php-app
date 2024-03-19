<?php

session_start();

$context = require("Context.php");
$app = new Context();

// // DEBUG :
// unset($_SESSION["cart"]);

$cart = (array) unserialize($_SESSION["cart"]);

// DEBUG :
var_dump($cart);

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
  <?php include("navbar.php") ?>

  <h1>Cart</h1>
  <h3>Total: <?php echo $app->total ?>€</h3>

  <?php if (count($cart) == 0 || $cart[0] == false) : ?>
    <button disabled>Cart Empty</button>
  <?php else : ?>
    <button>Proceed with Purchase</button>
  <?php endif; ?>


  <main class="gridStyle">

    <?php if (!isset($cart) || count($cart) == 0 || $cart[0] == false) : ?>
      <h2>Cart Empty</h2>
    <?php endif ?>

    <?php

    foreach ($cart as $cartItem) {

    ?>
      <div class="cardStyle" id="<?php echo $cartItem->id ?>">
        <figure>
          <img src="<?php echo $cartItem->thumbnail; ?>" alt="<?php echo $cartItem->title; ?>" />
        </figure>
        <h3><?php echo $cartItem->title; ?></h3>
        <p>
          <?php echo $cartItem->description; ?>
        </p>
        <div class="priceShelf">
          <p>
            <b>Price: <?php echo $cartItem->price; ?>€</b>
          </p>
          <p>
            <b>Quantity: <?php echo $cartItem->qty; ?></b>
          </p>
        </div>
      </div>
    <?php
    }
    ?>

</body>

</html>