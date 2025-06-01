<?php
require "../tubes/functions.php";

$donasi = query("SELECT * FROM donasi");
?>

<?php
require_once '../tubes/functions.php';
$kampanye = query("SELECT * FROM kampanye");
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" href="img/logo.jpg" />
  <link rel="stylesheet" href="index.css" />

  <title>Website Donasi</title>
</head>
<body>

  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Donasi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item mx-2"><a class="nav-link active" href="#home">Home</a></li>
        <li class="nav-item mx-2"><a class="nav-link" href="#kampanye">Kampanye</a></li>
        <li class="nav-item mx-2"><a class="nav-link" href="#donasi">Donasi</a></li>
      </ul>
      <div>
        <button class="btn btn-light me-2">Daftar</button>
        <button class="btn btn-outline-light">Masuk</button>
      </div>
    </div>
  </div>
</nav>


  <!-- Home Section -->
  <section id="home" class="text-info bg-primary">
    <div class="position-relative">
      <img src="../tubes/img/donasi.jpg" class="img-fluid w-100 vh-100" alt="Banner Donasi" style="object-fit: cover;" />
      <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
        <h1 class="display-3">Donasi Peduli</h1>
        <p class="lead">Bersama kita bisa membantu mereka yang membutuhkan.</p>
        <a href="#kampanye" class="btn btn-light btn-lg">Lihat Kampanye</a>
      </div>
    </div>
  </section>

 <!-- Kampanye Section -->
<section id="kampanye-baru" class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4">Kampanye Donasi</h2>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form action="../kampanye_controller.php" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
          
          <!-- Judul Kampanye -->
          <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" required maxlength="300" />
            <div class="invalid-feedback">Judul kampanye harus diisi (maksimal 300 karakter).</div>
          </div>
          
          <!-- Deskripsi -->
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required placeholder="Jelaskan tujuan dan manfaat kampanye ini..."></textarea>
            <div class="invalid-feedback">Deskripsi kampanye harus diisi.</div>
          </div>
          
          <!-- Target Dana -->
          <div class="mb-3">
            <label for="target_dana" class="form-label">Target Dana</label>
            <input type="number" name="target_dana" id="target_dana" class="form-control" required min="1000000" step="1000" />
            <div class="form-text">Minimal target dana Rp 1.000.000</div>
            <div class="invalid-feedback">Target dana harus diisi minimal Rp 1.000.000.</div>
          </div>
          
          <!-- Dana Terkumpul (Hidden/Readonly) -->
          <input type="hidden" name="dana_terkumpul" value="0" />
          
          <!-- Tanggal Mulai -->
          <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required />
            <div class="invalid-feedback">Tanggal mulai harus diisi.</div>
          </div>
          
          <!-- Tanggal Selesai -->
          <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required />
            <div class="invalid-feedback">Tanggal selesai harus diisi.</div>
          </div>
          
          <!-- Pendonatur ID -->
          <!-- <div class="mb-3">
            <label for="pendonatur_id" class="form-label">Pendonatur</label>
            <select name="pendonatur_id" id="pendonatur_id" class="form-select" required>
              <option value="">-- Pilih Pendonatur --</option> -->
              <!-- Contoh opsi, ganti dengan data dari database -->
              <!-- <option value="1">Pendonatur 1</option>
              <option value="2">Pendonatur 2</option>
              <option value="3">Pendonatur 3</option>
            </select>
            <div class="invalid-feedback">Pendonatur harus dipilih.</div>
          </div> -->
          
          <!-- Status -->
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
              <option value="">-- Pilih Status --</option>
              <option value="aktif" selected>Aktif</option>
              <option value="selesai">Selesai</option>
              <option value="ditutup">Ditutup</option>
            </select>
            <div class="invalid-feedback">Status kampanye harus dipilih.</div>
          </div>
          
          <!-- Upload Gambar (Opsional) -->
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Kampanye</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" />
            <div class="form-text">Format: JPG, PNG, JPEG. Maksimal 2MB.</div>
          </div>
          
          <!-- Dibuat Pada (Hidden - Otomatis) -->
          <input type="hidden" name="dibuat_pada" value="<?= date('Y-m-d H:i:s') ?>" />
          
          <!-- Submit Button -->
          <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg fs-6">Buat Kampanye</button>
            <button type="reset" class="btn btn-secondary btn-lg fs-6 ms-2">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

  



 <!-- Form Donasi -->
<section id="donasi" class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Form Donasi</h2>
    <form action="../donasi.php" method="post">
      <div class="mb-3">
        <label for="pendonatur_id" class="form-label">ID Pendonatur</label>
        <input type="number" name="pendonatur_id" id="pendonatur_id" class="form-control" required />
      </div>

      <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah Donasi</label>
        <input type="number" step="0.01" name="jumlah" id="jumlah" class="form-control" required />
      </div>

      <div class="mb-3">
        <label for="pesan" class="form-label">Pesan</label>
        <input type="text" name="pesan" id="pesan" class="form-control" />
      </div>

      <div class="mb-3">
        <label for="tanggal_donasi" class="form-label">Tanggal Donasi</label>
        <input type="date" name="tanggal_donasi" id="tanggal_donasi" class="form-control" required />
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary">Kirim Donasi</button>
      </div>
    </form>
  </div>
</section>


  <!-- Footer -->
  <footer class="bg-dark text-light py-4">
    <div class="container text-center">
      <p>&copy; 2025 Website Donasi. Bersama Kita Peduli.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
