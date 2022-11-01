<?= $this->extend('layout/menu') ?>
<?= $this->section('judul') ?>     
<p> <i class="fa fa-table"></i> Edit produk</p>
<?= $this->endSection(); ?>

<?= $this->section('isi') ?>
<script src="<?= base_url('assets/plugins/autoNumeric.js') ?>"></script>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <button type="button" class="btn btn-sm btn-warning"
                onclick="window.location='<?= site_url('produk/index') ?>'">
                <i class="fa fa-backward"></i> Kembali
            </button>
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <?= form_open_multipart('', ['class' => 'formupdate']) ?>
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="kodebarcode" class="col-sm-4 col-form-label">Kode Barcode</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="kodebarcode" name="kodebarcode" value="<?= $kode; ?>" readonly>
                </div>
        </div>
        <div class="form-group row">
            <label for="namaproduk" class="col-sm-4 col-form-label">Nama Produk</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="namaproduk" name="namaproduk" value="<?= $nama; ?>">
                <div class="invalid-feedback errorNamaProduk" style="display: none;">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="stok" class="col-sm-4 col-form-label">Stok Tersedia</label>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm" id="stok" name="stok" value="<?= $stok; ?>">
                <div class="invalid-feedback errorStok" style="display: none;">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
            <div class="col-sm-4">
                <select name="kategori" id="kategori" class="form-control">
                    <?php
                    foreach ($datakategori as $k):
                        if ($k['katid'] == $produkkategori) :                            
                            echo "<option value=\"$k[katid]\" selected >$k[katnama]</option>";
                         else :
                            echo "<option value=\"$k[katid]\">$k[katnama]</option>";
                        endif;
                        endforeach;    
                    ?>
                    
                </select>
            </div>      
        </div>
        <div class="form-group row">
            <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
            <div class="col-sm-4">
                <select class="form-control form-control-sm" name="satuan" id="satuan">
                    <?php
                    foreach ($datasatuan as $s):
                        if ($s['satid'] == $produksatuan) :                            
                            echo "<option value=\"$s[satid]\" selected >$s[satnama]</option>";
                         else :
                            echo "<option value=\"$s[satid]\">$s[satnama]</option>";
                        endif;
                    endforeach;    
                    
                    ?>
                </select>
            </div>
            
        </div>
        <div class="form-group row">
            <label for="hargabeli" class="col-sm-4 col-form-label">Harga Beli (Rp)</label>
            <div class="col-sm-4">
                <input style="text-align: right;" type="text" value="<?= $hargabeli ?>" class="form-control form-control-sm" name="hargabeli"
                    id="hargabeli">
                <div class="invalid-feedback errorHargaBeli" style="display: none;">
                </div>
            </div>

        </div>
        <div class="form-group row">
            <label for="hargajual" class="col-sm-4 col-form-label">Harga Jual (Rp)</label>
            <div class="col-sm-4">
                <input style="text-align: right;" type="text" value="<?= $hargajual ?>" class="form-control form-control-sm" name="hargajual"
                    id="hargajual">
                <div class="invalid-feedback errorHargaJual" style="display: none;">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Gambar produk</label>
            <div class="col-sm-4">
                <img src="<?= base_url($gambarproduk) ?>" style="width: 100;" class="img-thumnail" >
            </div>
        </div>

        <div class="form-group row">
            <label for="uploadgambar" class="col-sm-4 col-form-label">Ganti gambar (Jika Ada)</label>
            <div class="col-sm-4">
                <input type="file" name="uploadgambar" id="uploadgambar" class="form-control form-control-md"
                    accept=".jpg,.jpeg,.png">
                <div class="invalid-feedback errorUpload" style="display: none;">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="uploadgambar" class="col-sm-4 col-form-label"></label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-success tombolUpdateProduk">
                    Update
                </button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<div class="viewmodal" style="display: none;"></div>
<script>


$(document).ready(function() {
    tampilKategori();
    tampilSatuan();

    $('#hargabeli').autoNumeric('init', {
        aSep: ',',
        aDec: '.',
        mDec: '2'
    });
    $('#hargajual').autoNumeric('init', {
        aSep: ',',
        aDec: '.',
        mDec: '2'
    });
    $('#stok').autoNumeric('init', {
        aSep: ',',
        aDec: '.',
        mDec: '0'
    });
    tampilKategori();
    tampilSatuan();




    $('.tombolSimpanProduk').click(function(e) {
        e.preventDefault();
        let form = $('.formsimpan')[0];
        let data = new FormData(form);

        $.ajax({
            type: "post",
            url: "<?= site_url('produk/updatedata') ?>",
            data: data,
            dataType: "json",
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('.tombolSimpanProduk').html('<i class="fa fa-spin fa-spinner"></i>');
                $('.tombolSimpanProduk').prop('disabled', true);
            },
            complete: function() {
                $('.tombolSimpanProduk').html('Update');
                $('.tombolSimpanProduk').prop('disabled', false);
            },
            
            
            success: function(response) {
                if (response.error) {
                    let dataError = response.error;
                  

                    if (dataError.errorNamaProduk) {
                        $('.errorNamaProduk').html(dataError.errorNamaProduk).show();
                        $('#namaproduk').addClass('is-invalid');
                    } else {
                        $('.errorNamaProduk').fadeOut();
                        $('#namaproduk').removeClass('is-invalid');
                        $('#namaproduk').addClass('is-valid');
                    }
                    
                    if (dataError.errorUpload) {
                        $('.errorUpload').html(dataError.errorUpload).show();
                        $('#uploadgambar').removeClass('is-invalid');
                        $('#uploadgambar').addClass('is-invalid');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        html: response.sukses,

                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                }
            },
            error: function(xhr, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
});
</script>
<?= $this->endSection() ?>




