<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="gambar_lama" value="<?= isset($berita) ? $berita['gambar_berita'] : ''; ?>">
                <div class="mb-3">
                    <label>Judul Berita</label>
                    <input type="text" name="judul_berita" class="form-control" value="<?= isset($berita) ? $berita['judul_berita'] : ''; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>