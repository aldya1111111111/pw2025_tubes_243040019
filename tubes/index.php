<?php
require 'functions.php';

$mahasiswa = query("SELECT * FROM volunteer ORDER BY volunteer.nama ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RelawanKu - Sistem Manajemen Relawan Digital</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Volunteerx</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#opportunities">Kesempatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#organizations">Organisasi</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="fas fa-sign-out-alt"></i> Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- even -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="hero-title">Sistem Manajemen Relawan Digital</h1>
            <div class="mt-4">
                <button class="btn btn-light btn-custom" data-bs-toggle="modal" data-bs-target="#findModal">
                    <i class="fas fa-search"></i> Cari Kesempatan
                </button>
                <button class="btn btn-outline-light btn-outline-custom" data-bs-toggle="modal" data-bs-target="#postModal">
                    <i class="fas fa-plus"></i> Posting Kesempatan
                </button>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container content-section">
        <div class="row">
            <!-- even volunteerx -->
            <div class="col-lg-8" id="opportunities">
                <h2 class="section-title">Kesempatan Terbaru</h2>
                
                <div class="opportunity-card">
                    <h3 class="opportunity-title">Bakti Sosial</h3>
                    <p class="opportunity-location">
                        <i class="fas fa-map-marker-alt icon-location"></i>
                        BantuNet • Desa Suka Kamu
                    </p>
                    <p class="opportunity-description">
                        Kegiatan sosial di desa desa
                    </p>
                </div>

                <div class="opportunity-card">
                    <h3 class="opportunity-title">Pemghijawan Gunung</h3>
                    <p class="opportunity-location">
                        <i class="fas fa-map-marker-alt icon-location"></i>
                        Bumi Hijau • Bandung
                    </p>
                    <p class="opportunity-description">
                        Relawan untuk acara lingkungan dan pelestarian alam
                    </p>
                </div>

                <div class="opportunity-card">
                    <h3 class="opportunity-title">Pelatihan Pertolongan Pertama</h3>
                    <p class="opportunity-location">
                        <i class="fas fa-map-marker-alt icon-location"></i>
                        Yayasan Pendidikan • Bandung
                    </p>
                    <p class="opportunity-description">
                        Pelatihan dasar P3k Untuk anak-anak
                    </p>
                </div>
            </div>

            <!-- Organizations -->
            <div class="col-lg-4" id="organizations">
                <h2 class="section-title">Organisasi</h2>
                
                <div class="organization-item">
                    <i class="fas fa-hands-helping me-2"></i>
                    BantuNet
                </div>
                
                <div class="organization-item">
                    <i class="fas fa-leaf me-2"></i>
                    Bumi Hijau
                </div>
                
                <div class="organization-item">
                    <i class="fas fa-graduation-cap me-2"></i>
                    Yayasan Pendidikan
                </div>
            </div>
        </div>
    </div>

    <!-- volunteerx -->
    <div class="modal fade" id="findModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cari Kesempatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Lokasi</label>
                                <select class="form-select">
                                    <option>Semua Lokasi</option>
                                    <option>Jakarta</option>
                                    <option>Bandung</option>
                                    <option>Surabaya</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select">
                                    <option>Semua Kategori</option>
                                    <option>Layanan Komunitas</option>
                                    <option>Lingkungan</option>
                                    <option>Pendidikan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kata Kunci</label>
                            <input type="text" class="form-control" placeholder="Cari kesempatan...">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-custom">Cari</button>
                </div>
            </div>
        </div>
    </div>

    <!-- skill -->
    <div class="modal fade" id="postModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Posting Kesempatan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" placeholder="Judul kesempatan">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Organisasi</label>
                                <input type="text" class="form-control" placeholder="Nama organisasi">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Lokasi</label>
                                <input type="text" class="form-control" placeholder="Kota">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" rows="4" placeholder="Jelaskan kesempatan ini..."></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-custom">Posting Kesempatan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Login volunteerx -->
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin keluar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger">Keluar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>