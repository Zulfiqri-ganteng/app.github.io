<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul; ?> | SMK Galajuara Bekasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
        }

        .navbar-dark {
            background-color: #0A2647 !important;
        }

        .btn-primary {
            background-color: #0A2647;
            border-color: #0A2647;
        }

        /* (Sisa CSS Anda yang lain) */

        <?php if (isset($judul) && $judul == 'Login'): ?>

        /* CSS Khusus untuk Latar Belakang Animasi di Halaman Login */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background-color: #0A2647;
        }

        body {
            background-color: #0A2647;
        }

        nav.navbar {
            display: none !important;
            /* Sembunyikan navbar di halaman login */
        }

        .hero-caption {
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 50px;
        }

        .student-card:hover {
            transform: translateY(-5px);
            transition: 0.3s ease;
        }

        #hero {
            height: 70vh;
            overflow: hidden;
        }

        #hero img {
            height: 100%;
            object-fit: cover;
        }

        <?php endif; ?>
    </style>
</head>

<body>

    <?php if (isset($judul) && $judul == 'Login'): ?>
        <div id="particles-js"></div>
    <?php endif; ?>

    <?php $this->load->view('templates/navbar'); ?>