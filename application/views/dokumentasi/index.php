<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKRIPSI</title>
	 
    <!-- Bootstrap & DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 10;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color:rgb(99, 255, 195);
            color: #fff;
            text-align: center;
            padding: 10px 15px;
            border-radius: 15px 15px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
        }
        .header p {
            margin: 2px 0 0;
            font-size: 16px;
        }
        .profile {
            display: flex;
            align-items: center;
            padding: 20px;
        }
        .profile-img {
            width: 20%;
            height: auto;
            border-radius: 50%;
            border: 2px solid #ddd;
            margin-right: 20px;
        }
        .about {
            flex: 1;
        }
        .about p {
            margin: 5px 0;
            font-size: 16px;
        }
        .section {
            margin-top: 20px;
            margin-left: 10px;
        }
        .section h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #6c63ff;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
            margin-left: 10px;
        }
        ul {
            list-style: none;
            padding: 0;
            
        }
        ul li {
            margin-bottom: 0px;
            font-size: 16px;
            margin-left: 10px;
           
            
        }
    </style>
</head>
<body>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="float-right">
                        <a href="<?= base_url() ?>Dokumentasi/tambah" class="btn btn-info btn-sm">Tambah</a>
                        <a href="<?= base_url() ?>Dokumentasi/tampil" class="btn btn-warning btn-sm">
                            <i class="fa fa-refresh">Refresh</i>
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <table id="tabel" class="table table-striped table-bordered">
                        <thead class="text-left"> <!-- Tambahkan class text-left -->
                            <tr>
                                <th>No</th>
                                <th>Tentang</th>
                                <th>Tanggal</th>
                                <th>Gambar</th>
                                <th>Keterangan</th>
                                <th><i class="fa fa-cog"></i> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if (!empty($dokumentasi)) {  
                                foreach ($dokumentasi as $s => $rows) { ?>
                                    <tr>
                                        <td><?= $no++; ?>.</td>
                                        <td><?= isset($rows['hal']) ? $rows['hal'] : '-'; ?></td>
                                        <td><?= isset($rows['tanggal']) ? $rows['tanggal'] : '-'; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url().'uploads/dokumentasi/'.$rows['berkas'] ?>" target="_blank">
                                                <img src="<?= base_url().'uploads/dokumentasi/'.$rows['berkas'] ?>" width="100" height="100">
                                            </a>
                                        </td>
                                        <td><?= isset($rows['lampiran']) ? $rows['lampiran'] : '-'; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url() ?>Dokumentasi/edit/<?= $rows['id_dokumentasi'] ?>" class="btn btn-info btn-sm"> 
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url() ?>Dokumentasi/hapus/<?= $rows['id_dokumentasi'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk menghapus?');">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php 
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data skripsi.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> <!-- Tutup div.card-body -->
            </div> <!-- Tutup div.card -->
        </div> <!-- Tutup div.col-md-12 -->
    </div> <!-- Tutup div.row -->
</div> <!-- Tutup div.animated -->

    <!-- jQuery, Bootstrap & DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#tabel').DataTable({
                responsive: true,
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                scrollX: true,
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: 1 },
                    { responsivePriority: 3, targets: -1 }
                ]
            });
        });
    </script>
</body>
</html>
