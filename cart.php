<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>MoonStone</title>
    <link rel="icon" href="img/download (7).jpg" type="image/x-icon">

  <link rel="stylesheet" href="style/style.css" />
</head>
<body>
  <?php include 'header.php'; ?>


<main>
    <h2>🛒 შენი კალათა</h2>
    <div id="cartItems"></div>
    <p>ჯამი: <strong><span id="totalPrice">0.00</span> ₾</strong></p>
    <form id="paymentForm" action="done_pay.php" method="post" onsubmit="return handlePayment(event)">
      <br>  
      <label>
        ბარათით გადახდა
        <input type="radio" name="payment" value="card" required>
      </label>
      <br>
      <label>
        ქეშით გადახდა
        <input type="radio" name="payment" value="cash">
      </label>
      <br>
      <button type="submit">გადახდა</button>
    </form>


<script src="js/cart.js"></script>

</main>
<?php include 'footer.php'; ?>

<script src="js/menu.js"></script>

</body>
</html>