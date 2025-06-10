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
$result = mysqli_query($conn, "SELECT * FROM kampanye WHERE id = $id");

if (mysqli_num_rows($result) === 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$kampanye = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $judul = $_POST["judul"];
    $deskripsi = $_POST["deskripsi"];
    $target_dana = $_POST["target_dana"];
    $status = $_POST["status"];

    $query = "UPDATE kampanye SET 
        judul = '$judul', 
        deskripsi = '$deskripsi',
        target_dana = $target_dana,
        status = '$status' 
        WHERE id = $id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        header("Location: kampanyemasuk.php");
        exit;
    } else {
        echo "Gagal mengupdate kampanye.";
    }
}
?>

<h2>Edit Kampanye</h2>
<form method="post">
    <label>Judul:</label>
    <input type="text" name="judul" value="<?= htmlspecialchars($kampanye["judul"]) ?>">

    <label>Deskripsi:</label>
    <textarea name="deskripsi"><?= htmlspecialchars($kampanye["deskripsi"]) ?></textarea>

    <label>Target Dana:</label>
    <input type="number" name="target_dana" value="<?= $kampanye["target_dana"] ?>">

    <label>Status:</label>
    <select name="status">
        <option value="aktif" <?= $kampanye["status"] === "aktif" ? "selected" : "" ?>>Aktif</option>
        <option value="nonaktif" <?= $kampanye["status"] === "nonaktif" ? "selected" : "" ?>>Nonaktif</option>
    </select>

    <button type="submit">Simpan</button>
</form>
