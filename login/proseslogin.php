<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pw2025_tubes_243040019";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, nama, password FROM pendonatur WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($id, $nama, $hashed);
    $stmt->fetch();
    if (password_verify($password, $hashed)) {
        $_SESSION['pendonatur_id'] = $id;
        $_SESSION['nama'] = $nama;
        header("Location: ../../pw2025_tubes_243040019/tubes/index.php"); // Halaman setelah login
        exit;
    } else {
        echo "Password salah.";
    }
} else {
    echo "Email tidak ditemukan.";
}
$stmt->close();
$conn->close();
?>
