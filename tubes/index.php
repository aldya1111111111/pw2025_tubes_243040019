<?php
require "functions.php";

$donasi = query("SELECT * FROM donasi");
?>

<?php
require_once 'functions.php';
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
  <section id="kampanye" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-4">Kampanye Donasi</h2>
      <div class="row g-4">
<section id="kampanye-baru" class="py-5">
  <div class="container">
    <h2 class="text-center mb-4"></h2>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form action="proses_kampanye.php" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
          
          <!-- Judul Kampanye -->
          <div class="mb-3">
            <label for="judul" class="form-label">judul</label>
            <input type="text" name="judul" id="judul" class="form-control" required maxlength="300" />
            <div class="invalid-feedback">Judul kampanye harus diisi (maksimal 300 karakter).</div>
          </div>
          
          <!-- Deskripsi -->
          <div class="mb-3">
            <label for="deskripsi" class="form-label">deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required placeholder="Jelaskan tujuan dan manfaat kampanye ini..."></textarea>
            <div class="invalid-feedback">Deskripsi kampanye harus diisi.</div>
          </div>
          
          <!-- Target Dana -->
          <div class="mb-3">
            <label for="target_dana" class="form-label">target_dana</label>
            <input type="number" name="target_dana" id="target_dana" class="form-control" required min="1000000" step="1000" />
            <div class="form-text">Minimal target dana Rp 1.000.000</div>
            <div class="invalid-feedback">Target dana harus diisi minimal Rp 1.000.000.</div>
          </div>
          
          <!-- Dana Terkumpul (Hidden/Readonly) -->
          <input type="hidden" name="dana_terkumpul" value="0" />
          
          <!-- Tanggal Mulai -->
          <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">tanggal_mulai</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required />
            <div class="invalid-feedback">Tanggal mulai harus diisi.</div>
          </div>
          
          <!-- Tanggal Selesai -->
          <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">	tanggal_selesai</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required />
            <div class="invalid-feedback">Tanggal selesai harus diisi.</div>
          </div>
          
          <!-- Status -->
          <div class="mb-3">
            <label for="status" class="form-label">dibuat_pada</label>
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

<tr>
      <th>judul</th>
      <th>deskripsi</th>
      <th>target_dana</th>
      <th>dana_terkumpul</th>
      <th>tanggal_mulai</th>
      <th>tanggal_selesai</th>
      <th>dibuat_pada</th>
    </tr>
  </thead>
 <tbody>
  <?php foreach($kampanye as $k): ?>
    <tr>
      <td><?= htmlspecialchars($k['judul']); ?></td>
      <td><?= htmlspecialchars($k['deskripsi']); ?></td>
      <td><?= number_format($k['target_dana'], 0, ',', '.'); ?></td>
      <td><?= number_format($k['dana_terkumpul'], 0, ',', '.'); ?></td>
      <td><?= htmlspecialchars($k['tanggal_mulai']); ?></td>
      <td><?= htmlspecialchars($k['tanggal_selesai']); ?></td>
      <td><?= htmlspecialchars($k['dibuat_pada']); ?></td>

  <td>
  <img src="img/<?= htmlspecialchars($k['gambar']); ?>" style="width: 100px; height: 100px; object-fit: cover;" alt="Gambar Kampanye">
</td>
  <?php endforeach; ?>
</tbody>

  



  <!-- Form Donasi -->
  <section id="donasi" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Form Donasi</h2>
      <form action="donasi.php" method="post">
        <div class="mb-3">
          <label for="nama" class="form-label">id_pendonatur</label>
          <input type="text" name="nama" id="nama" class="form-control" required />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">jumlah</label>
          <input type="email" name="email" id="email" class="form-control" required />
        </div>
         <div class="mb-3">
          <label for="telepon" class="form-label">pesan</label>
          <input type="telepon" name="email" id="telepon" class="form-control" required />
        </div>
        <div class="mb-3">
          <label for="tanggal donasi" class="form-label">tanggal_donasi</label>
          <select name="tanggal donasi" id="tanggal donasi" class="form-control" required> 
          </select>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Kirim Donasi</button>
        </div>
        <table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>ID Pendonatur</th>
      <th>Jumlah</th>
      <th>Pesan</th>
      <th>Tanggal Donasi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach($donasi as $d): ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= ($d['id_pendonatur']); ?></td>
        <td><?= ($d['jumlah']); ?></td>
        <td><?= ($d['pesan']); ?></td>
        <td><?= ($d['tanggal_donasi']); ?></td>
        <td>
          <a href="hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus donasi ini?')">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>        
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
