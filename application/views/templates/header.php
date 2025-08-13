<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?? 'SMK Galajuara'; ?> | Aplikasi Sekolah</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Fonts (Opsional) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            padding-top: 80px;
        }

        .navbar {
            background-color: #002147 !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: rotate(10deg);
        }

        .nav-link:hover,
        .nav-link.active {
            color: #FFD700 !important;
        }

        .btn-outline-light:hover {
            background-color: #FFD700 !important;
            color: #002147 !important;
            border-color: #FFD700;
        }

        .dropdown-toggle::before {
            content: '\f0d7';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            margin-left: 0.5rem;
            color: #FFD700;
        }

        .form-control:focus {
            border-color: #FFD700;
            box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
        }
    </style>
</head>

<body>

    <!-- Load Navbar -->
    <?php $this->load->view('templates/navbar'); ?>

    <!-- Konten Utama -->
    <div class="container-fluid px-4">
        <?= $this->session->flashdata('message'); ?>
        <?php if (isset($contents)) echo $contents; ?>
    </div>

    <!-- JavaScript -->
    <script>
        // Animasi Toggle Password
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>