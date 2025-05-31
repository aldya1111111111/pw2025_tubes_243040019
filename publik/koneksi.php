<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "pw2025_tubes_243040019";

$koneksi = mysqli_connect "$server, $username, $pass, $db";
if(!koneksi) {
    "gagal terkoneksi";
}else("terkoneksi")
