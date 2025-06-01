<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pw2025_tubes_243040019";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];

$cek = $conn->prepare("SELECT id FROM pendonatur WHERE email = ?");
$cek->bind_param("s", $email);
$cek->execute();
$cek->store_result();
if ($cek->num_rows > 0) {
    die("Email sudah terdaftar. <a href='login.php'>Login di sini</a>");
}
$cek->close();

$stmt = $conn->prepare("INSERT INTO pendonatur (nama, email, password, telepon, alamat) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nama, $email, $password, $telepon, $alamat);
if ($stmt->execute()) {
    echo "Pendaftaran berhasil. <a href='login.php'>Login sekarang</a>";
} else {
    echo "Gagal daftar: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
