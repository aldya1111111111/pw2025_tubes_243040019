<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pw2025_tubes_243040019";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// === PROSES TAMBAH KAMPANYE ===
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $deskripsi = $_POST["deskripsi"];
    $target_dana = $_POST["target_dana"];
    $tanggal_mulai = $_POST["tanggal_mulai"];
    $tanggal_selesai = $_POST["tanggal_selesai"];
    $status = $_POST["status"];
    $dibuat_pada = date("Y-m-d H:i:s");
    $gambar = "";

    // Validasi tanggal
    if (strtotime($tanggal_mulai) > strtotime($tanggal_selesai)) {
        echo "<script>alert('Tanggal mulai tidak boleh setelah tanggal selesai.');</script>";
    } elseif ($target_dana < 1000000) {
        echo "<script>alert('Minimal target dana adalah Rp 1.000.000.');</script>";
    } else {
        // Upload gambar jika ada
        if (!empty($_FILES["gambar"]["name"])) {
            $upload_dir = "uploads/";
            $gambar_name = basename($_FILES["gambar"]["name"]);
            $target_path = $upload_dir . $gambar_name;
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_path)) {
                $gambar = $gambar_name;
            }
        }

        $sql = "INSERT INTO kampanye 
            (judul, deskripsi, target_dana, dana_terkumpul, tanggal_mulai, tanggal_selesai, status, gambar, dibuat_pada) 
            VALUES (?, ?, ?, 0, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisssss", $judul, $deskripsi, $target_dana, $tanggal_mulai, $tanggal_selesai, $status, $gambar, $dibuat_pada);
        $stmt->execute();
        $stmt->close();

        echo "<script>alert('Kampanye berhasil ditambahkan');</script>";
    }
}

$sql = "SELECT * FROM kampanye ORDER BY dibuat_pada DESC";
$result = $conn->query($sql);
?>

