<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title) ? $title : "Dashboard" ?> - Catatan Harian Khu </title>

    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/datatable/DataTables/css/dataTables.bootstrap4.css') ?>">

    <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <style>
        .main-header.navbar {
            background: linear-gradient(135deg, #6a11cb, #2575fc); /* Gradien warna */
            color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); /* Efek shadow */
        }

        .main-header.navbar .nav-link {
            color: white !important; /* Warna teks putih */
            padding: 10px 15px; /* Padding untuk ruang yang lebih baik */
        }

        .main-header.navbar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1); /* Efek hover */
            border-radius: 5px;
        }

        .main-header.navbar .navbar-nav.ml-auto .nav-link.text-danger:hover{
            background-color: rgba(255, 0, 0, 0.1);
        }

        .main-header.navbar .navbar-nav.ml-auto .nav-link.text-danger{
            color: red !important;
        }

        .main-header.navbar .navbar-nav.ml-auto{
            align-items: center;
        }

        .main-header.navbar .navbar-nav li{
            display: flex;
            align-items: center;
        }

        .main-header.navbar .navbar-nav li span{
            color: white;
            margin-right: 20px;
        }

    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= base_url('dashboard') ?>" class="nav-link">Dashboard</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
             
                <a class="nav-link text-danger" href="<?= base_url('logout') ?>">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </nav>
    </div>
</body>
</html>