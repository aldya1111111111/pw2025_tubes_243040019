<?php
require "../tubes/functions.php";

$daftar = query("SELECT * FROM pendonatur");
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>Daftar Pendonatur</title>
</head>

<body>
  <form action="../login/prosesdftar.php" method="post">
    <h2>Form Pendaftaran Pendonatur</h2>
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Telepon:</label><br>
    <input type="text" name="telepon"><br><br>

    <label>Alamat:</label><br>
    <textarea name="alamat"></textarea><br><br>

    <button type="submit">Daftar</button>
    <p>Sudah punya akun? <a href="../login/login.php">Login di sini</a></p>
  </form>
</body>

</html>