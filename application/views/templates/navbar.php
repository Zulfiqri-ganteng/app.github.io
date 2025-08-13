<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <!-- Logo Sekolah -->
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo SMK Galajuara" height="30" class="d-inline-block align-text-top me-2">
            SMK GALAJUARA
        </a>

        <!-- Button toggle untuk mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Utama -->
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSchoolProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil Sekolah
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownSchoolProfile">
                        <li><a class="dropdown-item" href="<?= base_url('profil-sekolah'); ?>">Sejarah Sekolah</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('visi-misi'); ?>">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('struktur-organisasi'); ?>">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('akademik'); ?>">Akademik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('humas'); ?>">Humas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('ekskul'); ?>">Ekskul</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownInfo" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownInfo">
                        <li><a class="dropdown-item" href="<?= base_url('pengumuman'); ?>">Pengumuman</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('berita'); ?>">Berita Terbaru</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('galeri'); ?>">Galeri Foto</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('ppdb'); ?>">PPDB</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('kontak'); ?>">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary ms-3" href="<?= base_url('auth/login'); ?>"><i class="fas fa-sign-in-alt me-1"></i> Sign In</a>
                </li>
            </ul>
        </div>
    </div>
</nav>