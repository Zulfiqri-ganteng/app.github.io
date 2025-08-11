<style>
    nav.navbar {
        display: none !important;
    }
</style>

<div class="container-fluid">
    <div class="row g-0" style="min-height: 100vh;">
        <div class="col-lg-7 d-none d-lg-block">
            <div class="bg-cover h-100" style="background-image: linear-gradient(rgba(10, 38, 71, 0.5), rgba(10, 38, 71, 0.5)), url('<?= base_url("assets/images/login-bg.jpg") ?>'); background-position: center; background-size: cover;">
                <div class="d-flex h-100 flex-column justify-content-end p-5 text-white">
                    <h2 class="fw-bold">Selamat Datang Kembali</h2>
                    <p>Silakan masuk untuk mengakses dasbor Anda.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-5 d-flex align-items-center justify-content-center">
            <div class="px-4 py-5 px-md-5" style="width: 100%; max-width: 450px;">
                <div class="text-center mb-4">
                    <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo Sekolah" style="width: 70px;">
                </div>

                <h3 class="fw-bold text-center">Login Area</h3>
                <p class="text-muted text-center mb-4">SMK Galajuara Kota Bekasi</p>

                <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('auth'); ?>" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-sign-in-alt me-2"></i>Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>