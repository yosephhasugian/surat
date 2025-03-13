<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    </head>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Pilih Tabel dan Periode</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pilihTabel">Pilih Tabel yang Akan Dicetak:</label>
                                <select class="form-control" id="pilihTabel">
                                    <option value="surat_masuk">Surat Masuk</option>
                                    <option value="surat_keluar">Surat Keluar</option>
                                    <option value="paparan">Paparan</option>
                                    <option value="dokumentasi">Dokumentasi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info" id="btnCetakKeseluruhan"><i class="fa fa-print"></i> Tampilkan Keseluruhan</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form method="POST" id="perpriode">
                                <div class="form-group">
                                    <label for="tglawal">Dari</label>
                                    <input type="date" id="tglawal" name="tglawal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tglakhir">Sampai</label>
                                    <input type="date" id="tglakhir" name="tglakhir" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info" id="btnCetakPeriode" type="submit"><i class="fa fa-print"></i> Tampilkan Periode</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="laporanContainer" style="margin-top: 20px;">
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#perpriode').validate({
        rules: {
            tglawal: { required: true },
            tglakhir: { required: true }
        },
        messages: {
            tglawal: { required: '<br><span class="alert alert-danger" role="alert">Inputan tidak boleh kosong!</span>' },
            tglakhir: { required: '<br><span class="alert alert-danger" role="alert">Inputan tidak boleh kosong!</span>' }
        }
    });

        $('#btnCetakKeseluruhan').click(function() {
            var tabel = $('#pilihTabel').val();
            $.ajax({
                url: "<?= base_url() ?>Periode/laporan/" + tabel,
                success: function(data) {
                    $('#laporanContainer').html(data);
                }
            });
        });

        $('#btnCetakPeriode').click(function(e) {
            e.preventDefault();
            if ($('#perpriode').valid()) {
                var tabel = $('#pilihTabel').val();
                var tglAwal = $('#tglawal').val();
                var tglAkhir = $('#tglakhir').val();
                $.ajax({
                    url: "<?= base_url() ?>Periode/cetakperiode/" + tabel + "/" + tglAwal + "/" + tglAkhir,
                    success: function(data) {
                        $('#laporanContainer').html(data);
                    }
                });
            }
        });
    });
</script>