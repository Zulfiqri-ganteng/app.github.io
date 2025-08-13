<!-- v_login.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SMK Galajuara</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Particle.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
        }

        .form-control:focus {
            border-color: #FFD700;
            box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
        }

        .particles-js-canvas-el {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            /* Animasi particle.js di belakang konten */
        }
    </style>
</head>

<body>

    <!-- Particle.js -->
    <div id="particles-js"></div>

    <!-- Konten Login -->
    <div class="container h-100">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg border-0 rounded-lg text-white" style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
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
                                    <i class="fas fa-eye-slash" id="eye-icon"></i>
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
                            <a href="<?= base_url('home'); ?>" class="text-dark" style="text-decoration: none;">
                                <i class="fas fa-home me-1"></i> Kembali ke Website
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS.load('particles-js', '<?= base_url('assets/js/particles.json'); ?>');
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (togglePassword) {
                togglePassword.addEventListener('click', function() {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    eyeIcon.classList.toggle('fa-eye');
                    eyeIcon.classList.toggle('fa-eye-slash');
                });
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>