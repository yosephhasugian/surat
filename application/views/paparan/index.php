
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Skripsi</title>
    <!-- Load CSS DataTables dan Responsive dari CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
    </style>
</head>
<div class="animated fadeIn">
    <div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	              
	                <span class="float-right">
	                	
	                		<a href="<?=base_url()?>Paparan/tambah" class="btn btn-info btn-sm">Tambah</a>
	                		<a href="<?=base_url()?>Skripsi/tampil" class="btn btn-warning btn-sm">Refresh</i></a>
	                </span>
	            </div>
	            <div class="card-body">
				<table id="tabel" class="table table-striped table-bordered">
	        			<thead class="text-center">
				          <tr>
				          	<th>No</th>
				            <th>Tentang</th>
							<th>Tanggal</th>
							<th>File Paparan</th>
				            <th>Keterangan</th>
				            <th><i class="fa fa-cog">Aksi</i></th>
				          </tr>
	        			</thead>
	        			<tbody>
													<?php 
							$no = 1;

							// Pastikan variabel ada sebelum looping
							if (!empty($paparan)) {  
								foreach ($paparan as $s => $rows) { ?>
									<tr>
										<td><?= $no++; ?>.</td>
										<td><?= isset($rows['hal']) ? $rows['hal'] : '-'; ?></td>
										<td><?= isset($rows['tanggal']) ? $rows['tanggal'] : '-'; ?></td>
										<td align="center"><a href="<?=base_url().'uploads/paparan/'.$rows['berkas']?>" target="_blank"><img src="<?=base_url()."assets/img/ppt.png"?>" width="50">
												</a></td>
										<td><?= isset($rows['lampiran']) ? $rows['lampiran'] : '-'; ?></td>
									
										<td>
											<a href="<?= base_url().'Paparan/edit/'.$rows['id_paparan']; ?>" class="btn btn-info btn-sm"> 
												<i class="fa fa-edit"></i>
											</a>
											<a href="<?= base_url().'Paparan/hapus/'.$rows['id_paparan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk menghapus');">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
								<?php 
								}
							} else { ?>
								<tr>
									<td colspan="7" align="center">Tidak ada data skripsi.</td>
								</tr>
							<?php } ?>
	        			</tbody>
	      			</table>
	            </div>
	        </div>
	    </div>
	</div>
</div><!-- .animated -->
<?php 
	function ind_for($tgl){
        $bulan = array(
            1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecah = explode('-', $tgl);
            return $pecah[2].' '.$bulan[(int)$pecah[1]].' '.$pecah[0];
        }
?>
 <!-- Load jQuery dan DataTables dari CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel').DataTable({
                responsive: true, // Aktifkan fitur responsif
                paging: true, // Aktifkan pagination
                searching: true, // Aktifkan pencarian
                ordering: true, // Aktifkan sorting
                info: true, // Tampilkan info jumlah data
                autoWidth: false, // Nonaktifkan auto width agar tabel tidak memanjang
                scrollX: true, // Aktifkan scroll horizontal jika diperlukan
                columnDefs: [
                    { responsivePriority: 1, targets: 0 }, // Prioritas responsif untuk kolom No
                    { responsivePriority: 2, targets: 1 }, // Prioritas responsif untuk kolom Nama Responden
                    { responsivePriority: 3, targets: -1 } // Prioritas responsif untuk kolom terakhir
                ]
            });
        });
    </script>