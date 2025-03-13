<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Paparan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan Monitoring Paparan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Hal</th>
                <th>Lampiran</th>
                <th>Tanggal</th>
               
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($paparan as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->hal; ?></td>
                    <td><?= $row->lampiran; ?></td>
                    <td><?= date('d-m-Y', strtotime($row->tanggal)); ?></td>
                  
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
