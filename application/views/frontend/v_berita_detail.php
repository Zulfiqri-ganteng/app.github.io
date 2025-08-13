<!-- Detail Berita -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Gambar Utama -->
                <div class="text-center mb-4">
                    <img src="<?= base_url('assets/images/berita/' . $berita['gambar_berita']); ?>"
                        class="img-fluid rounded shadow"
                        alt="<?= $berita['judul_berita']; ?>"
                        style="max-height: 500px; object-fit: cover;">
                </div>

                <!-- Judul -->
                <h1 class="mb-3"><?= $berita['judul_berita']; ?></h1>

                <!-- Metadata -->
                <p class="text-muted">
                    <i class="fas fa-calendar-alt"></i> <?= date('d F Y', strtotime($berita['tanggal_publish'])); ?> &bull;
                    <i class="fas fa-user"></i> <?= $berita['penulis_nama'] ?? 'Admin'; ?> &bull;
                    <i class="fas fa-eye"></i> <?= $berita['views'] ?> kali dibaca
                </p>

                <!-- Kategori (jika ada) -->
                <?php if (!empty($berita['kategori'])): ?>
                    <span class="badge bg-primary mb-4"><?= $berita['kategori']; ?></span>
                <?php endif; ?>

                <!-- Isi Berita -->
                <div class="article-content fs-5">
                    <?= $berita['isi_berita']; ?>
                </div>

                <!-- Garis Pemisah -->
                <hr class="my-5">

                <!-- Tombol Kembali -->
                <div class="text-center">
                    <a href="<?= base_url('berita'); ?>" class="btn btn-outline-secondary">
                        ← Kembali ke Daftar Berita
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Optional: CSS Tambahan -->
<style>
    .article-content p {
        margin-bottom: 1rem;
        line-height: 1.8;
    }

    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 20px 0;
    }

    .badge {
        font-size: 1em;
    }
</style>