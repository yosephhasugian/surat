<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Dokumentasi</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        img { width: 100px; height: auto; }
    </style>
</head>
<body>
    <h2>Laporan Monitoring Surat Keluar</h2>
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
            <?php $no = 1; foreach ($dokumentasi as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->hal; ?></td>
                    <td><?= $row->lampiran; ?></td>
                    <td><?= date('d-m-Y', strtotime($row->tanggal)); ?></td>
                    <td>
                        <?php
                        $file_path = 'uploads/dokumentasi/' . $row->berkas;
                        if (file_exists($file_path)) {
                            $data = file_get_contents($file_path);
                            $type = pathinfo($file_path, PATHINFO_EXTENSION);
                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                            echo '<img src="'.$base64.'">';
                        } else {
                            echo 'Gambar tidak ditemukan';
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
