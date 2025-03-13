<div class="animated fadeIn">
	
    <div class="row">
    	<!-- cetak keseluruhan -->
	    <div class="col-md-6">
	        <div class="card">
	            <div class="card-header">
	                <strong class="card-title"><?=$subJudul?></strong>
	            </div>
	            <div class="card-body">
	            	<div class="container text-center">
				        <h1 class="display-4"><i class="fa fa-print fa-2x"></i></h1>
				        <p class="lead">Cetak semua <?=$subJudul?></p>
				        <a class="btn btn-info btn-md" target="_blank" href="<?=base_url()?>rekap/laporan_surat_masuk/" role="button"><i class="fa fa-print"></i> Cetak</a>
				     </div>
	            </div>
	        </div>
	    </div>
		<!-- cetak keseluruhan -->
	    <div class="col-md-6">
	        <div class="card">
	            <div class="card-header">
	                <strong class="card-title"><?=$subJudul1?></strong>
	            </div>
	            <div class="card-body">
	            	<div class="container text-center">
				        <h1 class="display-4"><i class="fa fa-print fa-2x"></i></h1>
				        <p class="lead">Cetak semua <?=$subJudul1?></p>
				        <a class="btn btn-info btn-md" target="_blank" href="<?=base_url()?>rekap/laporan_surat_keluar/" role="button"><i class="fa fa-print"></i> Cetak</a>
				     </div>
	            </div>
	        </div>
	    </div>
		<!-- cetak keseluruhan -->
	    <div class="col-md-6">
	        <div class="card">
	            <div class="card-header">
	                <strong class="card-title"><?=$subJudul2?></strong>
	            </div>
	            <div class="card-body">
	            	<div class="container text-center">
				        <h1 class="display-4"><i class="fa fa-print fa-2x"></i></h1>
				        <p class="lead">Cetak semua <?=$subJudul2?></p>
				        <a class="btn btn-info btn-md" target="_blank" href="<?=base_url()?>rekap/laporan_paparan/" role="button"><i class="fa fa-print"></i> Cetak</a>
				     </div>
	            </div>
	        </div>
	    </div>
		<!-- cetak keseluruhan -->
	    <div class="col-md-6">
	        <div class="card">
	            <div class="card-header">
	                <strong class="card-title"><?=$subJudul3?></strong>
	            </div>
	            <div class="card-body">
	            	<div class="container text-center">
				        <h1 class="display-4"><i class="fa fa-print fa-2x"></i></h1>
				        <p class="lead">Cetak semua <?=$subJudul3?></p>
				        <a class="btn btn-info btn-md" target="_blank" href="<?=base_url()?>rekap/laporan_dokumentasi/" role="button"><i class="fa fa-print"></i> Cetak</a>
				     </div>
	            </div>
	        </div>
	    </div>
	    <!-- cetak perpriode -->
	    
	</div>
</div><!-- .animated -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#perpriode').validate({
			rules: {
				tglawal: {
					required: true
				},
				tglakhir: {
					required: {
						required: true
					}
				}
			},
			messages: {
				tglawal: {
					required: '<br><span class="alert alert-danger" role="alert">inputan tidak boleh kosong!</span>'
				},
				tglakhir: {
					required: '<br><span class="alert alert-danger" role="alert">inputan tidak boleh kosong!</span>'
				}
			}
		});
	});
</script>