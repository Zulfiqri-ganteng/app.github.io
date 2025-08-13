<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url('assets/images/slider/slider1.png'); ?>" class="d-block w-100" alt="Kegiatan Belajar">
            <div class="carousel-caption d-none d-md-block">
                <h5>Pendidikan Berkualitas</h5>
                <p>Menyediakan lingkungan belajar yang modern dan kondusif untuk prestasi.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('assets/images/slider/slider2.png'); ?>" class="d-block w-100" alt="Prestasi Siswa">
            <div class="carousel-caption d-none d-md-block">
                <h5>Generasi Kompeten</h5>
                <p>Mencetak lulusan yang siap bersaing di dunia kerja dan industri.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('assets/images/slider/slider3.png'); ?>" class="d-block w-100" alt="Ekstrakurikuler">
            <div class="carousel-caption d-none d-md-block">
                <h5>Kreatif dan Berkarakter</h5>
                <p>Mengembangkan bakat dan minat siswa melalui kegiatan ekstrakurikuler.</p>
            </div>
        </div>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <img id="foto-kepsek" src="<?= base_url('assets/images/kepala_sekolah.jpg') ?>" class="img-fluid rounded-circle shadow" alt="Kepala Sekolah">
            </div>
            <div class="col-md-8">
                <h2 class="section-title">Sambutan Kepala Sekolah</h2>
                <p class="text-muted">Selamat datang di website resmi SMK Galajuara. Kami berkomitmen untuk menyediakan pendidikan kejuruan berkualitas yang relevan dengan kebutuhan industri. Melalui website ini, kami berharap dapat memberikan informasi yang lengkap mengenai kegiatan dan prestasi sekolah kami.</p>
                <p><strong>Nama Kepala Sekolah, S.Pd., M.M.</strong></p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 section-bg">
    <div class="container">
        <h2 class="text-center section-title">Jurusan Unggulan</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100 p-4 jurusan-card">
                    <div class="icon"><i class="fas fa-laptop-code"></i></div>
                    <h4 class="fw-bold">Teknik Komputer & Jaringan (TKJ)</h4>
                    <p class="text-muted">Mempelajari perakitan, instalasi, dan perbaikan komputer serta administrasi jaringan.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 p-4 jurusan-card">
                    <div class="icon"><i class="fas fa-palette"></i></div>
                    <h4 class="fw-bold">Desain Komunikasi Visual (DKV)</h4>
                    <p class="text-muted">Mengembangkan kreativitas dalam desain grafis, animasi, dan produksi video.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 p-4 jurusan-card">
                    <div class="icon"><i class="fas fa-calculator"></i></div>
                    <h4 class="fw-bold">Akuntansi & Keuangan Lembaga (AKL)</h4>
                    <p class="text-muted">Menyiapkan tenaga profesional di bidang pembukuan, perpajakan, dan manajemen keuangan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="prestasi" class="py-5">
    <div class="container">
        <h2 class="text-center section-title">Siswa Berprestasi</h2>
        <div class="row justify-content-center">
            <?php if (!empty($siswa_berprestasi)): foreach ($siswa_berprestasi as $siswa): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card student-card shadow">
                    <img src="<?= base_url('assets/images/siswa/' . $siswa['foto']); ?>" class="student-card__image">
                    <div class="student-card__overlay">
                        <h4 class="student-card__title"><?= $siswa['nama_siswa']; ?></h4>
                        <p class="student-card__subtitle"><?= $siswa['kelas']; ?></p>
                    </div>
                    <?php if ($siswa['juara'] > 0): ?>
                        <div class="student-card__badge"><i class="fas fa-trophy"></i> Juara <?= $siswa['juara']; ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; else: ?>
                <p class="text-center text-muted">Belum ada data siswa berprestasi untuk ditampilkan.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-5 section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="section-title">Berita Terkini</h2>
                <div class="row">
                    <?php if(!empty($berita_terbaru)): foreach($berita_terbaru as $b): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= base_url('assets/images/berita/' . $b['gambar_berita']); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= $b['judul_berita']; ?></h5>
                                <small class="text-muted mb-2"><i class="fas fa-calendar-alt me-2"></i><?= date('d M Y', strtotime($b['tanggal_publish'])); ?></small>
                                <p class="card-text flex-grow-1"><?= word_limiter($b['isi_berita'], 15); ?></p>
                                <a href="#" class="btn btn-primary mt-auto align-self-start">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; else: ?>
                    <p class="text-muted">Belum ada berita terbaru.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <h2 class="section-title">Pengumuman</h2>
                <div class="list-group">
                    <?php if(!empty($pengumuman_terbaru)): foreach($pengumuman_terbaru as $p): ?>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1"><?= $p['judul']; ?></h6>
                        </div>
                        <small class="text-muted"><?= date('d F Y', strtotime($p['tanggal'])); ?></small>
                    </a>
                    <?php endforeach; else: ?>
                    <p class="text-muted">Belum ada pengumuman terbaru.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>