<!-- Hero Carousel dengan Overlay & CTA -->
<section id="hero">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/images/slider/slider1.png'); ?>" class="d-block w-100" alt="SMK Galajuara">
                <div class="carousel-caption hero-caption">
                    <h1>SMK Galajuara</h1>
                    <p>Unggul dalam Keahlian, Unggul dalam Karakter</p>
                    <a href="<?= base_url('ppdb'); ?>" class="btn btn-primary btn-lg mt-3">Daftar PPDB 2025</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/images/slider/slider2.png'); ?>" class="d-block w-100" alt="Prestasi Siswa">
                <div class="carousel-caption hero-caption">
                    <h1>Prestasi Gemilang</h1>
                    <p>Raih juara di tingkat nasional dan internasional</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/images/slider/slider3.png'); ?>" class="d-block w-100" alt="Kegiatan Sekolah">
                <div class="carousel-caption hero-caption">
                    <h1>Ekstrakurikuler Kreatif</h1>
                    <p>Kembangkan bakat di bidang seni, teknologi, dan olahraga</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<!-- Statistik Singkat (Counter) -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="mb-1" id="counter-students">0</h2>
                <p>Siswa Aktif</p>
            </div>
            <div class="col-md-3">
                <h2 class="mb-1" id="counter-graduates">0</h2>
                <p>Lulusan Terserap</p>
            </div>
            <div class="col-md-3">
                <h2 class="mb-1" id="counter-achievements">0</h2>
                <p>Prestasi</p>
            </div>
            <div class="col-md-3">
                <h2 class="mb-1" id="counter-teachers">0</h2>
                <p>Guru Profesional</p>
            </div>
        </div>
    </div>
</section>

<!-- Sambutan Kepala Sekolah -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <img src="<?= base_url('assets/images/kepala_sekolah.jpg') ?>" class="img-fluid rounded-circle shadow" style="max-width: 200px;">
            </div>
            <div class="col-md-8">
                <h2 class="section-title">Sambutan Kepala Sekolah</h2>
                <p class="lead">Selamat datang di website resmi SMK Galajuara, lembaga pendidikan kejuruan unggulan yang berkomitmen mencetak generasi profesional, kompeten, dan berkarakter.</p>
                <p>Kami menyediakan lingkungan belajar modern, fasilitas lengkap, dan program pelatihan yang relevan dengan kebutuhan industri. Mari wujudkan masa depan gemilang bersama SMK Galajuara.</p>
                <p><strong>Nama Kepala Sekolah, S.Pd., M.M.</strong></p>
            </div>
        </div>
    </div>
</section>

<!-- Jurusan Unggulan -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center section-title">Jurusan Unggulan</h2>
        <p class="text-center text-muted mb-5">Kami menawarkan program keahlian yang sesuai dengan kebutuhan industri masa kini.</p>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="p-4">
                        <i class="fas fa-laptop-code fa-3x text-primary mb-3"></i>
                        <h4>Teknik Komputer & Jaringan (TKJ)</h4>
                        <p>Perakitan, jaringan, dan keamanan sistem informasi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="p-4">
                        <i class="fas fa-camera-retro fa-3x text-primary mb-3"></i>
                        <h4>Desain Komunikasi Visual (DKV)</h4>
                        <p>Desain grafis, animasi, dan produksi media digital.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="p-4">
                        <i class="fas fa-cash-register fa-3x text-primary mb-3"></i>
                        <h4>Akuntansi & Keuangan Lembaga (AKL)</h4>
                        <p>Pembukuan, perpajakan, dan manajemen keuangan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Siswa Berprestasi -->
<section id="prestasi" class="py-5">
    <div class="container">
        <h2 class="text-center section-title">Siswa Berprestasi</h2>
        <p class="text-center text-muted mb-5">Inspirasi dari para juara kami yang mengharumkan nama sekolah.</p>
        <div class="row justify-content-center">
            <?php if (!empty($siswa_berprestasi)): ?>
                <?php foreach ($siswa_berprestasi as $siswa): ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card student-card h-100 border-0 shadow-sm text-center">
                            <img src="<?= base_url('assets/images/siswa/' . $siswa['foto']); ?>" class="card-img-top rounded-circle mx-auto" style="width: 120px; height: 120px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $siswa['nama_siswa']; ?></h5>
                                <p class="text-muted"><?= $siswa['kelas']; ?></p>
                                <?php if ($siswa['juara'] > 0): ?>
                                    <span class="badge bg-warning text-dark"><i class="fas fa-trophy"></i> Juara <?= $siswa['juara']; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-muted">Belum ada data siswa berprestasi.</p>
            <?php endif; ?>
        </div>
        <div class="text-center mt-4">
            <a href="<?= base_url('siswa'); ?>" class="btn btn-outline-primary">Lihat Semua Siswa</a>
        </div>
    </div>
</section>

<!-- Berita & Pengumuman -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center section-title">Berita Terkini</h2>
        <div class="row">
            <?php if (!empty($berita_terbaru)): ?>
                <?php foreach ($berita_terbaru as $b): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="<?= base_url('assets/images/berita/' . $b['gambar_berita']); ?>"
                                class="card-img-top"
                                alt="<?= $b['judul_berita']; ?>"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $b['judul_berita'] ?></h5>
                                <p class="card-text"><?= word_limiter($b['isi_berita'], 20) ?></p>
                                <a href="<?= base_url('berita/detail/' . $b['id']); ?>" class="btn btn-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Belum ada berita.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CTA - Ajakan Bergabung -->
<section class="py-5 bg-dark text-white text-center">
    <div class="container">
        <h2>Siap Menjadi Bagian dari SMK Galajuara?</h2>
        <p class="lead">Gabung sekarang dan raih masa depan cerah bersama kami.</p>
        <a href="<?= base_url('ppdb'); ?>" class="btn btn-warning btn-lg mt-3">Daftar Sekarang</a>
    </div>
</section>