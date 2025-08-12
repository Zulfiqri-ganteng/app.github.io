<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-newspaper me-2"></i><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Berita</h6>
            <a href="<?= base_url('admin/berita/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tulis Berita Baru
            </a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-5">
                    <form action="<?= base_url('admin/berita'); ?>" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari judul berita..." name="keyword">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <?php foreach ($berita as $b): ?>
                            <tr>
                                <td><?= $b['judul_berita']; ?></td>
                                <td><?= $b['kategori']; ?></td>
                                <td><?= date('d M Y', strtotime($b['tanggal_publish'])); ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?= $pagination; ?>
        </div>
    </div>
</div>