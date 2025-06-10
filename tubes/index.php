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
        <li class="nav-item mx-2"><a class="nav-link "href="#home">Home</a></li>
        <li class="nav-item mx-2"><a class="nav-link" href="#Bantuan">Bantuan</a></li>
        <li class="nav-item mx-2"><a class="nav-link" href="#kampanye">Kampanye</a></li>
        <li class="nav-item mx-2"><a class="nav-link" href="#donasi">Donasi</a></li>
        
      </ul>
      <div>
        <form action="../login/daftar.php" method="get" style="display:inline;">
          <button type="submit" class="btn btn-outline-light me-2" style="background-color: white; color: #0077b6; border: 2px solid #0077b6;">
            Daftar
          </button>
        </form>

        <form action="../login/login.php" method="get" style="display:inline;">
          <button type="submit" class="btn btn-outline-light" style="border: 2px solid white;">
            Masuk
          </button>
        </form>
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
        <p class="lead text-dark">Bersama kita bisa membantu mereka yang membutuhkan.</p>
        <a href="#kampanye" class="btn btn-light btn-lg">Lihat Kampanye</a>
      </div>
    </div>
  </section>


    <!-- Munu -->
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
  <div class="bg-white text-dark p-3">
    <h2 class="text-center mb-4">Buat Kampanye Donasi</h2>
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

          <!-- Upload Gambar -->
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Kampanye</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" />
            <div class="form-text">Format: JPG, PNG, JPEG. Maksimal 2MB.</div>
          </div>

          <!-- Dibuat Pada -->
          <input type="hidden" name="dibuat_pada" value="" />

          <!-- Submit Button -->
          <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg fs-6">Buat Kampanye</button>
            <button type="reset" class="btn btn-danger btn-lg fs-6 ms-2">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

 <!-- Form Donasi -->
<section id="donasi" class="py-5">
  <div class="bg-white text-dark p-3">
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
        <button type="submit" class="btn btn-success">Kirim Donasi</button>
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
