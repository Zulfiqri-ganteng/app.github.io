<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Judul Berita</label>
                    <input type="text" name="judul_berita" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Isi Berita</label>
                    <textarea name="isi_berita" class="form-control" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>