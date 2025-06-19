<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$loggedIn = false;
$firstLetter = "";

if (!empty($_SESSION["firstname"])) {
    $firstLetter = mb_strtoupper(mb_substr($_SESSION["firstname"], 0, 1));
    $loggedIn = true;
}
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MoonStone</title>
  <link rel="stylesheet" href="style/style.css">
</head>

<header>
  <div class="header-mobile">
    <h1 class="logo">
      <a href="index.php">
        <img src="img/download (7).jpg" alt="MoonStone" />
        MoonStone
      </a>
    </h1>

    <!-- მენიუს ღილაკი მხოლოდ მობილურისთვის -->
    <button class="menu-toggle" onclick="toggleMenu()" id="menuButton">
      მენიუ &#8681;
    </button>
  </div>

  <nav id="main-nav" class="main-nav">
    <ul class="main-menu" id="mainMenu">
      <li><a href="products.php">პროდუქტები</a></li>
      <li><a href="about_products.php">ბუნებრივი ქვები</a></li>
      <li><a href="cart.php">კალათა</a></li>

    </ul>

    <!-- მომხმარებლის მენიუ -->
    <div class="user-menu-container">
      <div class="circle-user" onclick="toggleUserMenu()">
        <?php if ($loggedIn): ?>
          <?= htmlspecialchars($firstLetter) ?>
        <?php else: ?>
          <img src="img/default-user.png" alt="Default User" class="default-user-img" />
        <?php endif; ?>
      </div>

      <ul class="user-dropdown" id="userDropdown">
        <?php if ($loggedIn): ?>
          <li><a href="logout.php">გამოსვლა</a></li>
        <?php else: ?>
          <li><a href="login.php">შესვლა</a></li>
          <li><a href="register.php">რეგისტრაცია</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
</header>

<script src="js/navmenu.js"></script>
<script src="js/menu.js"></script>
