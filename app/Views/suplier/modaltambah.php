
<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modaltambah" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaltambah">Tambah Data Suplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('suplier/simpandata' ,['class' => 'formsuplier'])  ?>
      <div class="modal-body">
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-laber"> No.BP</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="nobp" name="nobp">
                <div class="invalid-feedback errorNobp">
                    
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-laber"> Nama</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="nama" name="nama">
                <div class="invalid-feedback errorNama">
        
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-laber"> Tempat Lahir</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="taplahir" name="taplahir">
                <div class="invalid-feedback errorTaplahir">

                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-laber"> Tanggal Lahir</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="tgllahir" name="tgllahir">
                <div class="invalid-feedback errorTgllahir">

                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-laber"> Jenkel</label>
            <div class="col-sm-4">
                <select name="jenkel" id="jenkel" class="form-control">
                    <option value="">-Pilih-</option>
                    <option value="L">-Laki-laki-</option>
                    <option value="P">-Perempuan-</option>
                </select>
                <div class="invalid-feedback errorJenkel">
                    
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
            <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
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
                    $('.btnsimpan').html('simpan');

                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.nobp) {
                            $('#nobp').addClass('is-invalid');
                            $('.errorNobp').html(response.error.nobp);
                            
                        } else {
                            $('#nobp').removeClass('is-invalid');
                            $('.errorNobp').html('');
                        }

                        if (response.error.nama) {
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama);
                            
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }


                        if (response.error.taplahir) {
                            $('#taplahir').addClass('is-invalid');
                            $('.errorTaplahir').html(response.error.taplahir);
                            
                        } else {
                            $('#taplahir').removeClass('is-invalid');
                            $('.errorTaplahir').html('');
                        }

                        if (response.error.tgllahir) {
                            $('#tgllahir').addClass('is-invalid');
                            $('.errorTgllahir').html(response.error.tgllahir);
                            
                        } else {
                            $('#tgllahir').removeClass('is-invalid');
                            $('.errorTgllahir').html('');
                        }

                        if (response.error.jenkel) {
                            $('#jenkel').addClass('is-invalid');
                            $('.errorJenkel').html(response.error.jenkel);
                            
                        } else {
                            $('#jenkel').removeClass('is-invalid');
                            $('.errorJenkel').html('');
                        }

                    }  else{
                        Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'response.sukses',
                                    })



                        // untuk mengembalikan tampilan tambah ke tampilan view suplier
                        $('#modaltambah').modal('hide');
                        datasuplier();
                    }

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