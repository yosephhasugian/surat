<div class="animated fadeIn">
    <div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <strong class="card-title"><?=$subJudul?></strong>
	                <span class="float-right">
	                	<?php $id = @$_GET['id_surat']; ?>
	                	<a href="<?=base_url()?>Surat_masuk?id=<?=$id?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left"></i></a>
	                </span>
	            </div>
	            <div class="card-body">
                    	
	            	<form method="post" id="edit" action="<?php echo base_url().'Surat_masuk/proses_edit'?>" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3 offset-2">
                            	<label for="no_surat" class=" form-control-label">Nomor Surat</label>
                            </div>
                            <div class="col-12 col-md-4">
                            	<input type="text" id="no_surat" name="no_surat" placeholder="Nomor Surat" class="form-control" value="<?=$data->no_surat?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3 offset-2">
                            	<label for="hal" class=" form-control-label">Perihal</label>
                            </div>
                            <div class="col-12 col-md-4">
                            	<input type="text" id="hal" name="hal" placeholder="Perihal" class="form-control" value="<?=$data->hal?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3 offset-2">
                            	<label for="lampiran" class=" form-control-label">Ringkasan Surat</label>
                            </div>
                            <div class="col-12 col-md-4">
                            	<input type="text" id="lampiran" name="lampiran" placeholder="Lampiran" class="form-control" value="<?=$data->lampiran?>">
                            </div>
                        </div>
                        

                        <div class="row form-group">
                            <div class="col col-md-3 offset-2">
                            	<label for="berkas" class=" form-control-label">Uploads Berkas</label>
                            </div>
                            <div class="col-12 col-md-4">
                            	<input type="file" id="berkas" name="berkas" placeholder="Upload Berkas" class="form-control"value="<?=$data->berkas?>" >
                           
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3 offset-2">
                            	<label for="tujuan" class=" form-control-label">Asal Surat</label>
                            </div>
                            <div class="col-12 col-md-4">
                            	<input type="text" id="tujuan" name="tujuan" placeholder="tujuan" class="form-control" value="<?=$data->tujuan?>">
                                <input type="hidden" name="id" value="<?=$data->id_surat?>">
                                <input type="hidden" name="id_ket" value="<?=$data->id_keterangan;?>">
                                <input type="hidden" name="berkas" value="<?=$data->berkas;?>">
                           
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3 offset-2">
                            	<label for="id_jenis" class=" form-control-label">Jenis Surat</label>
                            </div>
                            <div class="col-12 col-md-4">
                            	<select name="id_jenis" id="id_jenis" class="form-control">
                            		<option value="<?=$data->id_jenis?>"><?=$data->jenis_surat?></option>
                            		<?php
                            			foreach ($jenis as $j => $rows) {
                            				?>
                            					<option value="<?=$rows['id']?>"><?=$rows['jenis_surat']?></option>
                            				<?php
                            			}
                            		?>
                            	</select>
                            </div>
                        </div>
                         <div class="row form-group">
                            <div class="col col-md-3 offset-2">
                            	<label for="tanggal" class=" form-control-label">Tanggal</label>
                            </div>
                            <div class="col-12 col-md-4">
                            	<input type="date" id="tanggal" name="tanggal" placeholder="Tanggal" class="form-control" value="<?=$data->tanggal?>">
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
        $('#edit').validate({
            rules: {
                no_surat: {
                    required: true
                },
                hal: {
                    required: true
                },
                lampiran: {
                    required: true
                },
                tujuan: {
                    required: true
                },
                jenis: {
                   required: true
                },
                berkas: {
                   required: true
                },
                tgl: {
                    required: true
                    
                }
            },
            messages: {
               no_surat: {
                 required: '<br><span class="alert alert-danger" role="alert">inputan tidak boleh kosong!</span>'
               },
               hal: {
                 required: '<br><span class="alert alert-danger" role="alert">inputan tidak boleh kosong!</span>'
               },
               lampiran: {
                 required: '<br><span class="alert alert-danger" role="alert">inputan tidak boleh kosong!</span>'
               },
              
               tujuan: {
                 required: '<br><span class="alert alert-danger" role="alert">inputan tidak boleh kosong!</span>'
               },
               jenis: {
                 required: '<br><span class="alert alert-danger" role="alert">inputan tidak boleh kosong!</span>'
               },
               berkas: {
                 required: '<br><span class="alert alert-danger" role="alert">Berkas tidak boleh kosong!</span>'
               },
               tgl: {
                 required: '<br><span class="alert alert-danger" role="alert">inputan tidak boleh kosong!</span>'
               }
            },
         
        function gagal() {
            swal({
                title: "OOPS",
                text: "Data gagal bestie diupdate",
                icon: "warning",
                dangerMode: true,
                buttons: [false, "OK"],
              }).then(function() {
                window.location.href="<?=base_url()?>Surat_masuk/edit/<?=$data->id_surat?>";
              });
        }
        function berhasil() {
            swal({
                title: "BERHASIl",
                text: "Data berhasil diupdate",
                icon: "success",
                buttons: [false, "OK"],
              }).then(function() {
                window.location.href="<?=base_url()?>Surat_masuk/tampil/<?=$data->id_surat;?>";
              });
        }
</script>