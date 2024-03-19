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
  <?php include("navbar.php") ?>

  <?php if (!$app->paid) : ?>
    <h1>Not paid yet</h1>
    <h3>Redirecting you to Homepage</h3>

    <script>
      setTimeout(() => {
        window.location.href = "./index.php";
      }, 5_000);
    </script>
  <?php else : ?> <h1>Success</h1>
    <h3>Thank you for your purchase</h3>
    <p>We hope you to get the shipment as soon as possible</p>

    <button>
      <a href="./index.php">Go to Home</a>
      <div>
        <table>
          <thead>
            <td>OrderID</td>
            <td>Quantity</td>
          </thead>
          <tbody>
            <?php

            foreach ($app->cart as $cartItem) {

            ?>

              <tr>
                <td><?php echo $cartItem->id ?></td>
                <td><?php echo $cartItem->qty ?></td>

              <?php

            }

              ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>


</body>