<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username && $password && file_exists("users.txt")) {
        $users = file("users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($users as $user) {
            list($firstname, $lastname, $savedUser, $hashedPass, $email, $phone, $address) = explode("|", $user);

            if ($username === $savedUser && password_verify($password, $hashedPass)) {
                $_SESSION["user"] = $savedUser;
                $_SESSION["firstname"] = $firstname;
                $_SESSION["lastname"] = $lastname;

                
                header("Location: index.php");
                exit;
            }
        }
    }

    $error = "მომხმარებლის სახელი ან პაროლი არასწორია.";
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
    <h2>შესვლა</h2>

    <form action="login.php" method="post">
      <input type="text" name="username" placeholder="მომხმარებელი" required><br>
      <input type="password" name="password" placeholder="პაროლი" required><br>
      <button type="submit">შესვლა</button>
          <?php if (!empty($error)) echo "<p>$error</p>"; ?>

    </form>
    
  </main>
  <?php include 'footer.php'; ?>

</body>
</html>
