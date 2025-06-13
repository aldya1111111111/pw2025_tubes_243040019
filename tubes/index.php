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

  <?php
session_start();

// Redirect ke login jika belum login
if (!isset($_SESSION['pendonatur_id'])) {
    header("Location: ../login/daftar.php");
    exit;
}
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-gradient fixed-top shadow-sm" style="background: linear-gradient(90deg, #007bff, #0056b3);">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#" style="font-size: 1.5rem;">🌟 Donasi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item mx-2">
          <a class="nav-link fw-semibold text-white" href="#home">Home</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link fw-semibold text-white" href="#Bantuan">Bantuan</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link fw-semibold text-white" href="#kampanye">Kampanye</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link fw-semibold text-white" href="#donasi">Donasi</a>
        </li>
      </ul>

      <div class="d-flex align-items-center">
        <span class="text-white me-3">👋 Halo, <strong><?= htmlspecialchars($_SESSION['nama']); ?></strong></span>
        <form action="../login/logout.php" method="post" class="d-inline">
          <button type="submit" class="btn btn-light btn-sm rounded-pill px-3 fw-semibold">Logout</button>
        </form>
      </div>
    </div>
  </div>
</nav>



  <!-- Home Section -->
<section id="home" class="position-relative">
  <img src="../tubes/img/donasi.jpg" class="img-fluid w-100 vh-100" alt="Banner Donasi" style="object-fit: cover; filter: brightness(60%);" />
  <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
    <h1 class="display-2 fw-bold">Donasi Peduli</h1>
    <p class="lead mb-4">💖 Bersama kita bisa membantu mereka yang membutuhkan.</p>
    <a href="#kampanye" class="btn btn-light btn-lg px-4 py-2 rounded-pill shadow">Lihat Kampanye</a>
  </div>
</section>

    <!-- bantuan -->
     <section id="Bantuan" class="py-5 bg-light">
      <div class="container">
        <h2 class="text-center">Bantuan</h2>
        <div class="row mt-4">
          <div class="col-md-4">
            <div class="card">
              <img src="../tubes/img/banjir.webp" class="card-img-top" alt="Coffe">
              <div class="card-body">
                <h5 class="card-title">Korban Banjir</h5>
                <p class="card-text">Donasi yang Anda berikan akan disalurkan untuk: Bantuan Darurat: Penyediaan kebutuhan dasar seperti makanan, air bersih, pakaian, dan obat-obatan bagi para korban. Pemulihan Infrastruktur: Perbaikan rumah, sekolah, dan fasilitas umum yang rusak akibat bencana.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img src="../tubes/img/pmi.jpg" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">Bantuan kesehatan</h5>
                <p class="card-text">Kita membutuhkan donor darah untuk para korban bencana alam</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img src="../tubes/img/pendidikan.jpg" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">Pendidikan</h5>
                <p class="card-text">Donasi pendidikan adalah pemberian sumbangan untuk mendukung akses pendidikan. Ini dapat membuka pintu bagi masa depan anak-anak dan memberikan harapan.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
     </section>

<!-- Kampanye Section -->
<section id="kampanye" class="py-5 bg-light">
  <div class="container bg-white rounded-4 shadow-lg p-5">
    <h2 class="text-center mb-5 fw-bold text-primary">Buat Kampanye Donasi</h2>

    <div class="row justify-content-center">
      <div class="col-lg-8">
        <form action="../kampanye_controller.php" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
          
          <!-- Judul Kampanye -->
          <div class="mb-4">
            <label for="judul" class="form-label fw-semibold">Judul Kampanye</label>
            <input type="text" name="judul" id="judul" class="form-control form-control-lg rounded-3" required maxlength="300" placeholder="Contoh: Bantu Korban Banjir">
            <div class="invalid-feedback">Judul kampanye harus diisi (maksimal 300 karakter).</div>
          </div>

          <!-- Deskripsi -->
          <div class="mb-4">
            <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control rounded-3" rows="5" required placeholder="Jelaskan tujuan dan manfaat kampanye ini..."></textarea>
            <div class="invalid-feedback">Deskripsi kampanye harus diisi.</div>
          </div>

          <!-- Target Dana -->
          <div class="mb-4">
            <label for="target_dana" class="form-label fw-semibold">Target Dana (Rp)</label>
            <input type="number" name="target_dana" id="target_dana" class="form-control rounded-3" required min="1000000" step="1000" placeholder="Contoh: 5000000">
            <div class="form-text">Minimal target dana Rp 1.000.000</div>
            <div class="invalid-feedback">Target dana harus diisi minimal Rp 1.000.000.</div>
          </div>

          <input type="hidden" name="dana_terkumpul" value="0" />

          <!-- Tanggal Mulai & Selesai -->
          <div class="row">
            <div class="col-md-6 mb-4">
              <label for="tanggal_mulai" class="form-label fw-semibold">Tanggal Mulai</label>
              <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control rounded-3" required>
              <div class="invalid-feedback">Tanggal mulai harus diisi.</div>
            </div>
            <div class="col-md-6 mb-4">
              <label for="tanggal_selesai" class="form-label fw-semibold">Tanggal Selesai</label>
              <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control rounded-3" required>
              <div class="invalid-feedback">Tanggal selesai harus diisi.</div>
            </div>
          </div>

          <!-- Status -->
          <div class="mb-4">
            <label for="status" class="form-label fw-semibold">Status Kampanye</label>
            <select name="status" id="status" class="form-select rounded-3" required>
              <option value="">-- Pilih Status --</option>
              <option value="aktif" selected>Aktif</option>
              <option value="selesai">Selesai</option>
              <option value="ditutup">Ditutup</option>
            </select>
            <div class="invalid-feedback">Status kampanye harus dipilih.</div>
          </div>

          <!-- Gambar Kampanye -->
          <div class="mb-4">
            <label for="gambar" class="form-label fw-semibold">Gambar Kampanye</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            <div class="form-text">Format: JPG, PNG, JPEG. Maksimal 2MB.</div>
          </div>

          <input type="hidden" name="dibuat_pada" value="" />

          <!-- Tombol -->
          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 me-2 shadow">Buat Kampanye</button>
            <button type="reset" class="btn btn-outline-danger btn-lg rounded-pill px-5 shadow">Reset</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>

<!-- Form Donasi -->
<section id="donasi" class="py-5 bg-light">
  <div class="container bg-white rounded-4 shadow p-5">
    <h2 class="text-center mb-4 text-primary fw-bold">Form Donasi</h2>

    <form action="../donasi.php" method="post" class="needs-validation" novalidate>
      <!-- ID Pendonatur -->
      <div class="mb-3">
        <label for="pendonatur_id" class="form-label fw-semibold">ID Pendonatur</label>
        <input type="number" name="pendonatur_id" id="pendonatur_id" class="form-control rounded-3" required placeholder="Masukkan ID Anda">
        <div class="invalid-feedback">ID Pendonatur wajib diisi.</div>
      </div>

      <!-- Jumlah Donasi -->
      <div class="mb-3">
        <label for="jumlah" class="form-label fw-semibold">Jumlah Donasi (Rp)</label>
        <input type="number" step="1000" name="jumlah" id="jumlah" class="form-control rounded-3" required placeholder="Contoh: 100000">
        <div class="invalid-feedback">Jumlah donasi tidak boleh kosong.</div>
      </div>

      <!-- Pesan -->
      <div class="mb-3">
        <label for="pesan" class="form-label fw-semibold">Pesan (Opsional)</label>
        <input type="text" name="pesan" id="pesan" class="form-control rounded-3" placeholder="Tulis pesan untuk penerima donasi...">
      </div>

      <!-- Tanggal Donasi -->
      <div class="mb-4">
        <label for="tanggal_donasi" class="form-label fw-semibold">Tanggal Donasi</label>
        <input type="date" name="tanggal_donasi" id="tanggal_donasi" class="form-control rounded-3" required>
        <div class="invalid-feedback">Tanggal donasi harus diisi.</div>
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg rounded-pill px-5 shadow-sm">Kirim Donasi</button>
      </div>
    </form>
  </div>
  <!-- footer -->
  <footer class="bg-dark text-light py-4">
    <div class="container text-center">
      <p>&copy; 2025 Website Donasi. Bersama Kita Peduli.</p>
    </div>
  </footer>
   <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  </html>
</section>


