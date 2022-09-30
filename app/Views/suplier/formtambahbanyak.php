
<?= form_open('suplier/simpandatabanyak',['class' => 'formsimpanbanyak']) ?>
<?= csrf_field() ?>
<div>
    <button type="button" class="btn btn-warning btnkembali">
        kembali
    </button>
    <button type="submit" class="btn btn-primary btnsimpanbanyakbanyak">
        simpan banyak
    </button>
</div>




<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>No.BP</th>
            <th>Nama Suplier</th>
            <th>Tempat lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
        </tr>
    </thead>






    <tbody class="formtambah">
        <tr>
            <td>
                <input type="text" name="nobp[]" class="form-control">
            </td>
            <td>
                <input type="text" name="nama[]" class="form-control">
            </td>
            <td>
                <input type="text" name="taplahir[]" class="form-control">
            </td>
            <td>
                <input type="date" name="tgllahir[]" class="form-control">
            </td>
            <td>
                <select name="jenkel[]" id="" class="form-control">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </td>
            <td>
                <button type="button" class="btn btn-primary btnaddform">
                    <i class="fa fa-plus"></i>
                </button>
            </td>
        </tr>
     
    </tbody>

</table>
<?= form_close(); ?>
<script>
    $(document).ready(function(e) {
        $('.formsimpanbanyak').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend:function(){
                    $('.btnsimpanbanyak').attr('disable','disabled');
                    $('.btnsimpanbanyak').html('<i class="fa fa-spil fa-spinner"></i>');

                },
                complete: function() {
                    $('.btnsimpanbanyak').removeAttr('disable');
                    $('.btnsimpanbanyak').html('simpan');

                },
                //jika berhasil disimpan banyak maka data dikembalikan ke halaman suplier /index
                success: function(response) {
                    if(response.sukses) {
                        window.location.href =("<?= site_url('suplier/index')?>");
                    }
                    

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert (xhr.status + "\n" + xhr.responseText + "\n" +
                thrownError);
            }
        });
        return false;
        });

        $('.btnaddform').click(function(e){
            e.preventDefault();

            $('.formtambah').append(`
            <tr>
                <td>
                    <input type="text" name="nobp[]" class="form-control">
                </td>
                <td>
                    <input type="text" name="nama[]" class="form-control">
                </td>
                <td>
                    <input type="text" name="taplahir[]" class="form-control">
                </td>
                <td>
                    <input type="date" name="tgllahir[]" class="form-control">
                </td>
                <td>
                    <select name="jenkel[]" id="" class="form-control">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btnhapusform">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            `);
        });
    });

    // untuk menghapus form tambahbanyak 
    $(document).on('click','.btnhapusform',function(e){
        e.preventDefault();

    $(this).parents('tr').remove();
    });
</script>


