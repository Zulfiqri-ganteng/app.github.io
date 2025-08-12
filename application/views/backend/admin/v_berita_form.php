<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-edit me-2"></i><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <?php if (isset($berita)): ?>
                    <input type="hidden" name="gambar_lama" value="<?= $berita['gambar_berita']; ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label>Judul Berita</label>
                    <input type="text" name="judul_berita" class="form-control" value="<?= isset($berita) ? $berita['judul_berita'] : set_value('judul_berita'); ?>" required>
                </div>
                <div class="mb-3">
                    <label>Isi Berita</label>
                    <textarea name="isi_berita" class="form-control" rows="10" required><?= isset($berita) ? $berita['isi_berita'] : set_value('isi_berita'); ?></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control" placeholder="Contoh: Prestasi, Acara Sekolah" value="<?= isset($berita) ? $berita['kategori'] : set_value('kategori'); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Gambar Utama</label>
                        <?php if (isset($berita) && $berita['gambar_berita'] != 'default.jpg'): ?>
                            <img src="<?= base_url('assets/images/berita/' . $berita['gambar_berita']); ?>" width="100" class="img-thumbnail d-block mb-2">
                        <?php endif; ?>
                        <input type="file" name="gambar_berita" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="is_headline" value="1" <?= (isset($berita) && $berita['is_headline'] == 1) ? 'checked' : ''; ?>>
                    <label class="form-check-label">Jadikan Berita Utama (Headline)?</label>
                </div>
                <hr>
                <a href="<?= base_url('admin/berita'); ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>