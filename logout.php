<?php
session_start();

// სესიის ყველა მონაცემის წაშლა
$_SESSION = array();

// სესიის დესტროირება
session_destroy();

// გადამისამართება მთავარ გვერდზე
header("Location: index.php");
exit;
?>
