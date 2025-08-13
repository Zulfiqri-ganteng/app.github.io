<!-- Navbar Profesional -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top" style="background-color: #002147 !important;">
    <div class="container-fluid">
        <!-- Logo dan Brand -->
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url(); ?>">
            <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo SMK Galajuara" height="35" class="me-2">
            <span class="fw-bold">SMK GALAJUARA</span>
        </a>

        <!-- Tombol Toggle untuk Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navigasi -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') ? 'active' : ''; ?>" href="<?= base_url(); ?>">
                        <i class="fas fa-home me-1 d-lg-none"></i> Home
                    </a>
                </li>

                <!-- Profil Sekolah -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-school me-1 d-lg-none"></i> Profil
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow" aria-labelledby="navbarDropdownProfil">
                        <li><a class="dropdown-item" href="<?= base_url('home#tentang'); ?>">Tentang Kami</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('home#kepala-sekolah'); ?>">Kepala Sekolah</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('home#jurusan'); ?>">Jurusan Unggulan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('siswa'); ?>">Siswa Berprestasi</a></li>
                    </ul>
                </li>

                <!-- Akademik -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAkademik" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-graduation-cap me-1 d-lg-none"></i> Akademik
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow" aria-labelledby="navbarDropdownAkademik">
                        <li><a class="dropdown-item" href="<?= base_url('guru'); ?>">Guru & Staf</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('ppdb'); ?>">PPDB</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('ujian'); ?>">Ujian Online</a></li>
                    </ul>
                </li>

                <!-- Informasi -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownInfo" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bullhorn me-1 d-lg-none"></i> Informasi
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow" aria-labelledby="navbarDropdownInfo">
                        <li><a class="dropdown-item" href="<?= base_url('pengumuman'); ?>">Pengumuman</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('berita'); ?>">Berita Terkini</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('gallery'); ?>">Galeri Foto</a></li>
                    </ul>
                </li>

                <!-- Kontak -->
                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(1) == 'kontak') ? 'active' : ''; ?>" href="<?= base_url('kontak'); ?>">
                        <i class="fas fa-phone-alt me-1 d-lg-none"></i> Kontak
                    </a>
                </li>

                <!-- Login / Dashboard -->
                <?php if ($this->session->userdata('logged_in')): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>
                            <?= $this->session->userdata('nama_lengkap') ?? 'Admin'; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow" aria-labelledby="navbarDropdownUser">
                            <li><a class="dropdown-item" href="<?= base_url('admin/profil'); ?>"><i class="fas fa-user-cog me-2"></i> Profil & Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light btn-sm px-3" href="<?= base_url('auth'); ?>">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<!-- Spacer agar konten tidak tertutup navbar -->
<div class="mt-5"></div>

<!-- CSS Tambahan untuk Navbar -->
<style>
    .navbar {
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .navbar-brand img {
        transition: transform 0.3s ease;
    }

    .navbar-brand:hover img {
        transform: rotate(10deg);
    }

    .nav-link.active,
    .nav-link:hover {
        color: #FFD700 !important;
        transform: none;
    }

    .dropdown-menu {
        background-color: #fff;
        border: none;
        border-radius: 8px;
        overflow: hidden;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #002147;
    }

    .btn-outline-light:hover {
        background-color: #FFD700 !important;
        color: #002147 !important;
        border-color: #FFD700;
    }

    .dropdown-toggle::after {
        display: none;
    }

    .dropdown-toggle::before {
        content: '\f0d7';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        margin-left: 0.5rem;
        color: #FFD700;
    }
</style>