<div class="modal fade" id="modaltambahpelanggan" tabindex="-1" aria-labelledby="modaltambahpelangganLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambahpelangganLabel">Tambah pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('pelanggan/simpandata', ['class' => 'formsimpan']) ?>
            <input type="hidden" name="aksi" id="aksi" value="<?= $aksi; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Kode Pelanggan</label>
                    <input type="text" name="pel_kode" id="pel_kode" class="form-control form-control-sm"
                        required>
                </div>
                <div class="form-group">
                    <label for="">Nama pelanggan</label>
                    <input type="text" name="pel_nama" id="pel_nama" class="form-control form-control-sm"
                        required>
                </div>
                <div class="form-group">
                    <label for="">Alamat Pelanggan</label>
                    <input type="text" name="pel_alamat" id="Pel_alamat" class="form-control form-control-sm"
                        required>
                </div>
                <div class="form-group">
                    <label for="">Telepon Pelanggan</label>
                    <input type="text" name="pel_telp" id="pel_telp" class="form-control form-control-sm"
                        required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary tombolSimpan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {
    $('.formsimpan').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function(e) {
                $('.tombolSimpan').prop('disabled', true);
                $('.tombolSimpan').html('<i class="fa fa-spin fa-spinner"></i>')
            },
            success: function(response) {
                let aksi = $('#aksi').val();
                if (response.sukses) {
                    if (aksi == 0) {
                        Swal.fire(
                            'Berhasil',
                            response.sukses,
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    } else {
                        tampilPelanggan();
                        $('#modaltambahpelanggan').modal('hide');
                    }
                }
            },
            error: function(xhr, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
});
</script>









