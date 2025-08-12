<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 rounded-lg text-white" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);">
                <div class="card-body p-5 text-center">

                    <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo Sekolah" width="80" class="mb-4">
                    <h3 class="fw-bold mb-4">Login Area</h3>

                    <?= $this->session->flashdata('message'); ?>

                    <form action="<?= base_url('auth'); ?>" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-sign-in-alt me-2"></i>Login</button>
                        </div>
                        <p class="text-muted small mt-2">
                            <i class="fas fa-info-circle me-1"></i>
                            Menggunakan NISN/NIP sebagai username, dan password default (DDYYMM) sesuai tanggal lahir.

                        </p>


                    </form>

                    <div class="text-center mt-3">
                        <a href="<?= base_url('home'); ?>" class="text-white" style="text-decoration: none;">
                            <i class="fas fa-home me-1"></i> Kembali ke Website
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>