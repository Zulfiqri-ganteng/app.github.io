<!-- Detail Berita -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Gambar Utama -->
                <div class="text-center mb-4">
                    <img
                        src="<?= base_url('assets/images/berita/' . ($berita['gambar_berita'] ?? 'default.jpg')); ?>"
                        class="img-fluid rounded shadow"
                        alt="<?= htmlspecialchars($berita['judul_berita']); ?>"
                        style="max-height: 500px; width: 100%; object-fit: cover;">
                </div>

                <!-- Judul -->
                <h1 class="mb-3"><?= htmlspecialchars($berita['judul_berita']); ?></h1>

                <!-- Metadata -->
                <p class="text-muted small">
                    <i class="fas fa-calendar-alt"></i> <?= date('d F Y H:i', strtotime($berita['tanggal_publish'])); ?> &nbsp;|&nbsp;
                    <i class="fas fa-user"></i> <?= $penulis ?> &nbsp;|&nbsp;
                    <i class="fas fa-eye"></i> <?= $berita['views'] ?> kali dibaca
                </p>

                <!-- Kategori -->
                <?php if (!empty($berita['kategori'])): ?>
                    <span class="badge bg-primary mb-4"><?= $berita['kategori']; ?></span>
                <?php endif; ?>

                <!-- Isi Berita -->
                <article class="article-content fs-5 text-dark" style="line-height: 1.8;">
                    <?= $berita['isi_berita']; ?>
                </article>

                <!-- Tombol Share -->
                <div class="mt-5">
                    <strong>Bagikan:</strong>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>" target="_blank" class="btn btn-sm btn-outline-primary mx-1">
                        <i class="fab fa-facebook"></i> Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()) ?>&text=<?= urlencode($berita['judul_berita']) ?>" target="_blank" class="btn btn-sm btn-outline-info mx-1">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                    <a href="https://api.whatsapp.com/send?text=<?= urlencode($berita['judul_berita'] . ' - ' . current_url()) ?>" target="_blank" class="btn btn-sm btn-outline-success mx-1">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                </div>

                <!-- Garis Pemisah -->
                <hr class="my-5">

                <!-- Tombol Kembali -->
                <div class="text-center">
                    <a href="<?= base_url('berita'); ?>" class="btn btn-outline-secondary px-4">
                        ← Kembali ke Daftar Berita
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- CSS Tambahan -->
<style>
    .article-content p {
        margin-bottom: 1.2rem;
    }

    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 20px 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .article-content h2,
    .article-content h3 {
        margin-top: 1.5rem;
        color: #2c3e50;
    }

    .badge {
        font-size: 0.9em;
    }
</style>