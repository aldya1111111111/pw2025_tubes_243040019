<?php
$conn = mysqli_connect("localhost", "root", "", "pw2025_tubes_243040019");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (!isset($_GET["id"])) {
    echo "ID kampanye tidak ditemukan.";
    exit;
}

$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM kampanye WHERE id = $id");

if (mysqli_affected_rows($conn) > 0) {
    header("Location: kampanyemasuk.php");
    exit;
} else {
    echo "Gagal menghapus kampanye.";
}
?>
