<?php

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

  <h1>Cart</h1>
  <main class="gridStyle">
    <?php

    foreach ($app->cart as $cartItem) {

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