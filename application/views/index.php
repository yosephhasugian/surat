<!doctype html>
<html class="no-js" lang="en"> <!-- Pastikan lang diisi sesuai -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Catatan Skripsi Khu</title>
    <meta name="description" content="Sistem Pengarsipan Surat Online">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.PNG">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/scss/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!-- Scripts -->
    <script src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?=base_url()?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins.js"></script>
    <script src="<?=base_url()?>assets/js/sweetalert.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.validate.min.js"></script>
</head>
<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <?php $this->load->view('menu'); ?>
    </aside>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header -->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left" aria-label="Toggle menu">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                    </a>
                    <div class="header-left">
                        <button class="search-trigger" aria-label="Open search">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                        <div class="form-inline">
                        <form class="search-form" role="search" aria-label="Search form">
                            <label for="search-input" class="sr-only">Search</label>
                            <input type="text" id="search-input" name="search" class="form-control mr-sm-2"  placeholder="Search" aria-label="Search" autocomplete="on"/>
                            <button class="search-close" type="submit" aria-label="Submit search">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Breadcrumbs -->
            
       

        <!-- Content -->
        <div class="content mt-3">
            <?php $this->load->view($content); ?>
        </div>
    </div>

    <!-- DataTable Script -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabel').DataTable();
        });
    </script>
</body>
</html>
