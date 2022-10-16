<?= $this->extend('layout/menu'); ?>
<?= $this->section('isi'); ?>


<section>
    <div>
        <h2> Data Customer</h2>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a type="button" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>

                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-file-alt"></i> Lokasi Baru</a>


                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
                </button> -->
                
    
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


        <form method="POST" action="/customer/index">
            <?= csrf_field(); ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Nama Customer" name="caricustomer" autofocus>
                <button class="btn btn-primary" type="submit" name="tombolcustomer" >Cari</button>
            </div>
        </form>
            <table class="table table-sm table-stiped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Alamat Customer</th>
                        <th>Ket</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <?php $a = 1 + (($nohalaman - 1) * 10); ?>
                        <?php 
                        foreach ($datacustomer as $c): 
                        ?>
                            
                            <tr>
                                <td><?= $a++; ?></td>
                                <td><?= $c['namacustomer']; ?></td>
                                <td><?= $c['alamatcustomer']; ?></td>
                                <td><?= $c['ket']; ?></td>
                                <td>
                                    <a href="" class="btn btn-warning">update</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                       <?php endforeach; ?>
                    </tbody>
            </table>
                            <div class="float-center">
                                <?= $pager->links('customer','paging_data'); ?>
                            </div>
    </div>



</div>

</section>



<!-- <div class="viewmodal" style="display: none ;"></div>

<script>
    $(document).ready(function () {
        $('.tombolTambah').click(function(e){
            e.preventDefault();

            $.ajax({
                url: "<?= site_url('kategori/formTambah') ?>",
                dataType: "json",
                success: function(response) {
                    if(response.data) {
                        $('.viewmodel').html(response.data).show();
                        $('#modaltambahkategori').modal('show');
                    }

                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script> -->
<?= $this-> endsection(); ?>




<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>