<?php
require "functions.php";

$mahasiswa = query("SELECT * FROM pendonatur ORDER BY nama ASC");

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

      <!-- Kampanye 1 -->
      <div class="col-md-4">
        <div class="card h-100">
          <img src="../tubes/img/banjir.webp" class="card-img-top" alt="Kampanye Banjir" />
          <div class="card-body">
            <h5 class="card-title">Bantu Korban Banjir</h5>
            <p class="card-text">Bantu korban banjir untuk mendapatkan tempat tinggal, makanan, dan obat-obatan.</p>
            <p class="fw-bold text-primary">👥 124 Donatur</p>
          </div>
        </div>
      </div>

      <!-- Kampanye 2 -->
      <div class="col-md-4">
        <div class="card h-100">
          <img src="../tubes/img/pendidikan.jpg" class="card-img-top" alt="Kampanye Pendidikan" />
          <div class="card-body">
            <h5 class="card-title">Donasi Pendidikan</h5>
            <p class="card-text">Berikan akses pendidikan untuk anak-anak di daerah terpencil.</p>
            <p class="fw-bold text-primary">👥 98 Donatur</p>
          </div>
        </div>
      </div>

      <!-- Kampanye 3 -->
      <div class="col-md-4">
        <div class="card h-100">
          <img src="../tubes/img/kesehatan.png" class="card-img-top" alt="Kampanye Kesehatan" />
          <div class="card-body">
            <h5 class="card-title">Bantuan Kesehatan</h5>
            <p class="card-text">Donasi untuk pengadaan obat-obatan dan layanan medis gratis.</p>
            <p class="fw-bold text-primary">👥 212 Donatur</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


  <!-- Form Donasi -->
  <section id="donasi" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Form Donasi</h2>
      <form action="donasi.php" method="post">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control" required />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" id="email" class="form-control" required />
        </div>
         <div class="mb-3">
          <label for="telepon" class="form-label">Telepon</label>
          <input type="telepon" name="email" id="telepon" class="form-control" required />
        </div>
        <div class="mb-3">
          <label for="kampanye" class="form-label">Pilih Kampanye</label>
          <select name="kampanye" id="kampanye" class="form-select" required>
            <option value="Banjir">Bantu Korban Banjir</option>
            <option value="Pendidikan">Donasi Pendidikan</option>
            <option value="Kesehatan">Bantuan Kesehatan</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="jumlah" class="form-label">Jumlah Donasi (Rp)</label>
          <input type="number" name="jumlah" id="jumlah" class="form-control" required />
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
