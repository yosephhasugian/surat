<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Surat Menyurat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .sidebar {
            height: 100vh;
            background: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Menu -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="position-sticky">
                    <h4 class="text-white text-center">Menu</h4>
                    <a href="#">Dashboard</a>
                    <a href="#">Surat Masuk</a>
                    <a href="#">Surat Keluar</a>
                    <a href="#">Laporan</a>
                    <a href="#">Pengaturan</a>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <h2>Dashboard Surat Menyurat</h2>
                <div class="row">
                    <!-- Kotak Informasi -->
                    <div class="col-md-6">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Surat Masuk</h5>
                                <p class="card-text display-6">120</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Surat Keluar</h5>
                                <p class="card-text display-6">85</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Grafik Statistik -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Statistik Surat</h5>
                        <canvas id="chartSurat"></canvas>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script>
        var ctx = document.getElementById('chartSurat').getContext('2d');
        var chartSurat = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei'],
                datasets: [{
                    label: 'Surat Masuk',
                    data: [20, 25, 30, 40, 50],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }, {
                    label: 'Surat Keluar',
                    data: [15, 20, 25, 35, 45],
                    backgroundColor: 'rgba(75, 192, 192, 0.6)'
                }]
            }
        });
    </script>
</body>
</html>
