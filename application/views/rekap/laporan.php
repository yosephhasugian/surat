<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <?php if (!empty($data)): ?>
                    <?php foreach (array_keys((array)$data[0]) as $kolom): ?>
                        <th><?= $kolom ?></th>
                    <?php endforeach; ?>
                    <th>Berkas</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <?php foreach ($row as $value): ?>
                            <td><?= $value ?></td>
                        <?php endforeach; ?>
                        <td>
    <?php if (!empty($row->berkas)): ?>
        <?php
            $folder = '';
            if ($tabel == 'surat_masuk') {
                $folder = 'surat_masuk';
            } elseif ($tabel == 'surat_keluar') {
                $folder = 'surat_keluar';
            } elseif ($tabel == 'paparan') {
                $folder = 'paparan';
            } elseif ($tabel == 'dokumentasi') {
                $folder = 'dokumentasi';
            }
        ?>
        <?php if (!empty($folder)): ?>
            <a href="<?= base_url('uploads/' . $folder . '/' . $row->berkas) ?>" target="_blank">Lihat Berkas</a>
        <?php else: ?>
            Tidak Ada Folder
        <?php endif; ?>
    <?php else: ?>
        Tidak Ada Berkas
    <?php endif; ?>
</td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>