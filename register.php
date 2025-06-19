<?php
session_start();
$loggedIn = isset($_SESSION["user"]);
if ($loggedIn) {
    $firstLetter = strtoupper(substr($_SESSION["firstname"], 0, 1));
} else {
    $firstLetter = "";
}

// რეგისტრაციის დამუშავება
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);
    $password = trim($_POST["password"]);

    if ($firstname && $lastname && $username && $email && $phone && $address && $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // ვამოწმებთ უკვე არსებობს თუ არა მომხმარებელი
        $users = file("users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($users as $user) {
            $fields = explode("|", $user);
            if ($fields[2] === $username) {
                echo "<p>მომხმარებელი უკვე არსებობს!</p>";
                exit;
            }
        }

        $line = implode("|", [
            $firstname, $lastname, $username,
            $hashedPassword, $email, $phone, $address
        ]) . "\n";

        file_put_contents("users.txt", $line, FILE_APPEND);

        header("Location: login.php");
        exit;
    } else {
        echo "<p>ყველა ველი სავალდებულოა!</p>";
    }
}
?>
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

<main class="main4">

  <h2>რეგისტრაცია</h2>
  <form action="register.php" method="post">
    <input type="text" name="firstname" placeholder="სახელი" required><br>
    <input type="text" name="lastname" placeholder="გვარი" required><br>
    <input type="text" name="username" placeholder="მომხმარებელი" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="tel" name="phone" placeholder="ტელეფონი" required><br>
    <input type="text" name="address" placeholder="მისამართი" required><br>
    <input type="password" name="password" placeholder="პაროლი" required><br>
    <button type="submit">რეგისტრაცია</button>
  </form>
</main>
  <script src="/web/js/menu.js"></script>
  <?php include 'footer.php'; ?>

</body>
</html>
