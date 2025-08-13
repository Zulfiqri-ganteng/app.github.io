<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-shield me-2"></i><?= htmlspecialchars($judul); ?>
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <!-- Informasi Akun -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-id-card me-2"></i>Informasi Akun
                    </h6>
                </div>
                <div class="card-body">
                    <p><strong>Nama Lengkap:</strong> <?= htmlspecialchars($admin['nama_lengkap']); ?></p>
                    <p><strong>Username:</strong> <?= htmlspecialchars($admin['username']); ?></p>
                    <p><strong>Level:</strong> 
                        <span class="badge bg-success text-white"><?= ucfirst(htmlspecialchars($admin['level'])); ?></span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Ganti Password -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-key me-2"></i>Ganti Password
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_open('admin/profil/update_password'); ?>
                        <div class="mb-3">
                            <label class="form-label">Password Lama</label>
                            <input type="password" name="password_lama" class="form-control" required>
                            <?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" required>
                            <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="konfirmasi_password" class="form-control" required>
                            <?= form_error('konfirmasi_password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Update Password
                        </button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>