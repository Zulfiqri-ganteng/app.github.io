<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-plus me-2"></i><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('admin/berita/tambah'); ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Judul Berita</label>
                    <input type="text" name="judul_berita" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Isi Berita</label>
                    <textarea name="isi_berita" class="form-control" rows="10" required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control" placeholder="Contoh: Prestasi, Acara Sekolah" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Gambar Utama</label>
                        <input type="file" name="gambar_berita" class="form-control">
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="is_headline" value="1">
                    <label class="form-check-label">Jadikan Berita Utama (Headline)?</label>
                </div>
                <hr>
                <a href="<?= base_url('admin/berita'); ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan & Publikasikan
                </button>
            </form>
        </div>
    </div>
</div>