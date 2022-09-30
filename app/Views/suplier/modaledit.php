
<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="modaledit" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaledit">Edit Data Suplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('suplier/updatedata' ,['class' => 'formsuplier'])  ?>
      <?= csrf_field(); ?>
      <div class="modal-body">
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-laber"> No.BP</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="nobp" name="nobp" value="<?= $nobp ?>" readonly >

            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-laber"> Nama</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>">
           
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-laber"> Tempat Lahir</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="taplahir" name="taplahir" value="<?= $taplahir ?>">
   
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-laber"> Tanggal Lahir</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="tgllahir" name="tgllahir" value="<?= $tgllahir ?>">

            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-laber"> Jenkel</label>
            <div class="col-sm-4">
                <select name="jenkel" id="jenkel" class="form-control">
                    <option value="L" <?php if ($jenkel == 'L') echo "selected"; ?>>Laki-laki</option>
                    <option value="P" <?php if ($jenkel == 'P') echo "selected"; ?>>Perempuan</option>
                </select>
                <div class="invalid-feedback errorJenkel">
                    
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
            <button type="submit" class="btn btn-primary btnsimpan">Update</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>




<script>
$(document).ready(function () {
        $('.formsuplier').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend:function(){
                    $('.btnsimpan').attr('disable','disabled');
                    $('.btnsimpan').html('<i class="fa fa-spil fa-spinner"></i>');

                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable');
                    $('.btnsimpan').html('update');

                },
                success: function(response) {
                        Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Berhasil diupdate',
                                    })
                        // untuk mengembalikan tampilan tambah ke tampilan view suplier
                        $('#modaledit').modal('hide');
                        datasuplier();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert (xhr.status + "\n" + xhr.responseText + "\n" +
                thrownError);
            }
        });
        return false;
    });
});
</script> 