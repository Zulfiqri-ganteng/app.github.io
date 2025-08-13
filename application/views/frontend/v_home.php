<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active"><img src="<?= base_url('assets/images/slider/slider1.png'); ?>" class="d-block w-100"></div>
        <div class="carousel-item"><img src="<?= base_url('assets/images/slider/slider2.png'); ?>" class="d-block w-100"></div>
        <div class="carousel-item"><img src="<?= base_url('assets/images/slider/slider3.png'); ?>" class="d-block w-100"></div>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <img src="<?= base_url('assets/images/kepala_sekolah.jpg') ?>" class="img-fluid rounded-circle shadow" style="max-width: 250px;">
            </div>
            <div class="col-md-8">
                <h2 class="section-title">Sambutan Kepala Sekolah</h2>
                <p class="text-muted">Selamat datang di website resmi SMK Galajuara...</p>
                <p><strong>Nama Kepala Sekolah, S.Pd., M.M.</strong></p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 section-bg">
</section>

<section id="prestasi" class="py-5">
    <div class="container">
        <h2 class="text-center section-title">Siswa Berprestasi</h2>
        <div class="row justify-content-center">
            <?php if (!empty($siswa_berprestasi)): foreach ($siswa_berprestasi as $siswa): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card student-card">
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
                <?php endforeach;
            else: ?>
                <p class="text-center text-muted">Belum ada data siswa berprestasi.</p>
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
                    <?php if (!empty($berita_terbaru)): foreach ($berita_terbaru as $b): ?>
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <img src="<?= base_url('assets/images/berita/' . $b['gambar_berita']); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $b['judul_berita']; ?></h5>
                                        <small class="text-muted"><i class="fas fa-calendar-alt me-2"></i><?= date('d M Y', strtotime($b['tanggal_publish'])); ?></small>
                                        <p class="card-text mt-2"><?= word_limiter($b['isi_berita'], 15); ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <h2 class="section-title">Pengumuman</h2>
                <div class="list-group">
                    <?php if (!empty($pengumuman_terbaru)): foreach ($pengumuman_terbaru as $p): ?>
                            <a href="#" class="list-group-item list-group-item-action">
                                <h6 class="mb-1"><?= $p['judul']; ?></h6>
                                <small class="text-muted"><?= date('d F Y', strtotime($p['tanggal'])); ?></small>
                            </a>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>