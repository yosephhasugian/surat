<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Surat Menyurat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">Dashboard Surat Menyurat</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Surat Masuk</h5>
                    <p class="card-text display-6">
                        <?= !empty($surat_masuk) ? count($surat_masuk) : 0; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Surat Keluar</h5>
                    <p class="card-text display-6">
                        <?= !empty($surat_keluar) ? count($surat_keluar) : 0; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Paparan</h5>
                    <p class="card-text display-6">
                        <?= !empty($paparan) ? count($paparan) : 0; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Dokumentasi</h5>
                    <p class="card-text display-6">
                        <?= !empty($dokumentasi) ? count($dokumentasi) : 0; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Statistik -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-center">Statistik Surat Per Bulan (<?= date('Y'); ?>)</h5>
        </div>
        <div class="card-body">
            <canvas id="chartSurat"></canvas>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('chartSurat').getContext('2d');

    var bulanLengkap = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    var dataMasuk = new Array(12).fill(0); 
    var dataKeluar = new Array(12).fill(0);
    var dataPaparan = new Array(12).fill(0);
    var dataDokumentasi = new Array(12).fill(0);

    <?php if (!empty($statistik_surat_masuk)): ?>
        <?php foreach ($statistik_surat_masuk as $data) : ?>
            dataMasuk[<?= $data->bulan - 1 ?>] = <?= $data->total ?>;
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($statistik_surat_keluar)): ?>
        <?php foreach ($statistik_surat_keluar as $data) : ?>
            dataKeluar[<?= $data->bulan - 1 ?>] = <?= $data->total ?>;
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($statistik_paparan)): ?>
        <?php foreach ($statistik_paparan as $data) : ?>
            dataPaparan[<?= $data->bulan - 1 ?>] = <?= $data->total ?>;
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($statistik_dokumentasi)): ?>
        <?php foreach ($statistik_dokumentasi as $data) : ?>
            dataDokumentasi[<?= $data->bulan - 1 ?>] = <?= $data->total ?>;
        <?php endforeach; ?>
    <?php endif; ?>

    var chartSurat = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: bulanLengkap,
            datasets: [
                {
                    label: 'Surat Masuk',
                    data: dataMasuk,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Surat Keluar',
                    data: dataKeluar,
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Paparan',
                    data: dataPaparan,
                    backgroundColor: 'rgba(255, 206, 86, 0.7)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Dokumentasi',
                    data: dataDokumentasi,
                    backgroundColor: 'rgba(153, 102, 255, 0.7)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


</body>
</html>
