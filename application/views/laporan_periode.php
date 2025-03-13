<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Periode</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Laporan Monitoring Dokumentasi (<?= date('d-m-Y', strtotime($_POST['tglawal'])) ?> - <?= date('d-m-Y', strtotime($_POST['tglakhir'])) ?>)</h2>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Hal</th>
                <th>Lampiran</th>
                <th>Tanggal</th>
                <th>Dokumentasi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dokumentasi)): ?>
                <?php $no = 1; foreach ($dokumentasi as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['hal']; ?></td>
                        <td><?= $row['lampiran']; ?></td>
                        <td><?= date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                        <td>
                            <?php
                            $file_path = 'uploads/dokumentasi/' . $row['berkas'];
                            if (file_exists($file_path)) {
                                echo '<img src="' . base_url($file_path) . '" width="100">';
                            } else {
                                echo 'Gambar tidak ditemukan';
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" style="text-align: center;">Data tidak ditemukan</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
