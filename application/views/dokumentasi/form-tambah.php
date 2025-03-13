<div class="animated fadeIn">
    <div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <strong class="card-title"><?=$sub_title?></strong>
	                <span class="float-right">
                       	<a href="<?=base_url()?>dokumentasi/tampil/patrials" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left"></i></a>
	                </span>
	            </div>
	            <div class="card-body">
	            	<form method="post" id="tambah" method="POST" action="<?php echo base_url().'Dokumentasi/simpan'?>"  enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3 offset-2">
                            	<label for="hal" class=" form-control-label">Tentang</label>
                            </div>
                            <div class="col-12 col-md-4">
                            	<input type="text" id="hal" name="hal" placeholder="Perihal" class="form-control">
                            </div>
                        </div>
                        
                       
                        <div class="row form-group">
                            <div class="col col-md-3 offset-2">
                            	<label for="berkas" class=" form-control-label">Uploads Gambar</label>
                            </div>
                            <div class="col-12 col-md-4">
                            	<input type="file" id="berkas" name="berkas" placeholder="Upload Berkas" class="form-control">
                            </div>
                        </div>

                         <div class="row form-group">
                            <div class="col col-md-3 offset-2">
                            	<label for="tanggal" class=" form-control-label">Tanggal</label>
                            </div>
                            <div class="col-12 col-md-4">
                            	<input type="date" id="tanggal" name="tanggal" placeholder="Tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3 offset-2">
                            	<label for="lampiran" class=" form-control-label">Keterangan</label>
                            </div>
                            <div class="col-12 col-md-4">
                            <textarea id="lampiran" name="lampiran" placeholder="Keterangan" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3 offset-2">
                            </div>
                            <div class="col-12 col-md-4">
                            	<button class="btn btn-info" id="btnSimpan" type="submit">Simpan</button>
                        		<button class="btn btn-danger" type="reset">Batal</button>
                            </div>
                        </div>
                    </form>
	            </div>
	        </div>
	    </div>
	</div>
</div><!-- .animated -->
<script>
    $(document).ready(function(){
        $.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        $('#tambah').validate({
            rules: {
                
                hal: {
                    required: true
                },
                lampiran: {
                    required: true
                },
                jenis: {
                   required: true
                },
                tgl: {
                    required: true
                },
                berkas: {
                   required: true
            },
            messages: {
               
               hal: {
                 required: '<br><span class="alert alert-danger" role="alert">inputan tidak boleh kosong!</span>'
               },
               lampiran: {
                 required: '<br><span class="alert alert-danger" role="alert">inputan tidak boleh kosong!</span>'
               
               },
               tgl: {
                 required: '<br><span class="alert alert-danger" role="alert">inputan tidak boleh kosong!</span>'
               
            },
            submitHandler: function (form) {
               var data = $('#tambah').serialize();
               $.ajax({
                url: '<?=base_url()?>Dokumentasi/simpan/',
                data: data,
                type: 'POST',
                success: function (data) {
                        if (data === "true") {
                            berhasil();
                        }else{
                            gagal();
                        }
                    }
               });
            }
        });
    });
       
</script>