<?php

session_start();

$context = require("Context.php");
$app = new Context();

$cart = $_SESSION["cart"];

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

  <h1>Cart</h1>
  <h3>Total: <?php echo $app->total ?>€</h3>

  <?php if (count($app->cart) == 0) : ?>
    <button disabled>Cart Empty</button>
  <?php else : ?>
    <button>Proceed with Purchase</button>
  <?php endif; ?>


  <main class="gridStyle">
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