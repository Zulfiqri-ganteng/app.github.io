<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-user-edit me-2"></i><?= $judul; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Akun</h6>
                </div>
                <div class="card-body">
                    <p><strong>Nama Lengkap:</strong> <?= $admin['nama_lengkap']; ?></p>
                    <p><strong>Username:</strong> <?= $admin['username']; ?></p>
                    <p><strong>Level:</strong> <span class="badge bg-success text-white"><?= ucfirst($admin['level']); ?></span></p>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/profil/update_password'); ?>" method="post">
                        <div class="mb-3">
                            <label>Password Lama</label>
                            <input type="password" name="password_lama" class="form-control" required>
                            <?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label>Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" required>
                            <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="konfirmasi_password" class="form-control" required>
                            <?= form_error('konfirmasi_password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Update Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>