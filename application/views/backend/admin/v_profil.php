<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-shield me-2"></i> <?= htmlspecialchars($judul); ?>
    </h1>

    <!-- Flash Message (akan diganti SweetAlert) -->
    <div id="flash-message" style="display: none;">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="row">
        <!-- Kolom Foto & Edit Profil -->
        <div class="col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-image me-2"></i> Foto Profil
                    </h6>
                </div>
                <div class="card-body text-center">
                    <img src="<?= base_url('assets/images/profil/' . ($admin['foto'] ?? 'default.jpg')); ?>"
                        class="img-fluid rounded-circle mb-3"
                        style="width: 150px; height: 150px; object-fit: cover;"
                        alt="Foto Profil">

                    <form action="<?= base_url('admin/profil/upload_foto'); ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="file" name="foto_profil" class="form-control" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-upload me-1"></i> Upload Foto
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Kolom Edit Nama & Username -->
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-user-edit me-2"></i> Edit Profil
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_open('admin/profil', ['method' => 'post']); ?>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control"
                            value="<?= htmlspecialchars($admin['nama_lengkap']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control"
                            value="<?= htmlspecialchars($admin['username']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                    <?= form_close(); ?>
                </div>
            </div>

            <!-- Ganti Password -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-key me-2"></i> Ganti Password
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_open('admin/profil/update_password', ['method' => 'post']); ?>
                    <div class="mb-3">
                        <label class="form-label">Password Lama</label>
                        <input type="password" name="password_lama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="password_baru" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_baru_konfirmasi" class="form-control" required>
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

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const flash = document.getElementById('flash-message');
        if (flash && flash.innerHTML.trim() !== '') {
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = flash.innerHTML;
            const alert = tempDiv.querySelector('.alert');
            const strong = alert.querySelector('strong');
            const message = alert.textContent.replace(strong?.outerHTML || '', '').trim();

            Swal.fire({
                icon: alert.classList.contains('alert-success') ? 'success' : alert.classList.contains('alert-warning') ? 'warning' : 'error',
                title: alert.classList.contains('alert-success') ? 'Berhasil!' : alert.classList.contains('alert-warning') ? 'Perhatian!' : 'Gagal!',
                text: message,
                confirmButtonText: 'OK'
            });
        }
    });
</script>