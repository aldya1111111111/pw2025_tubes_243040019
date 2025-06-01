<?php
require "../tubes/functions.php";

$login = query("SELECT * FROM pendonatur");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Pendonatur</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form action="proseslogin.php" method="post">
    <h2>Login Pendonatur</h2>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Login</button>

    <p>Belum punya akun? <a href="daftar.php">Daftar di sini</a></p>
  </form>
</body>
</html>
