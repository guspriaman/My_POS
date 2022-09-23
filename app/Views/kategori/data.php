
<?= $this-> extend('layout/menu'); ?>



<?= $this-> section('isi'); ?>

<section class="content-wrapper">
    <div>
        <h2> Data Kategori</h2>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-sm btn-primary tombolTambah">
                    <i class="fa fa-plus"></i> Tambah Data
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


        <form method="POST" action="/kategori/index">
            <?= csrf_field(); ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Nama Kategori" name="carikategori" autofocus>
                <button class="btn btn-primary" type="submit" name="tombolkategori" >Cari</button>
            </div>
        </form>
            <table class="table table-sm table-stiped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <?php $a = 1 + (($nohalaman - 1) * 5); ?>
                        <?php 
                        foreach ($datakategori as $row): 
                        ?>
                            
                            <tr>
                                <td><?= $a++; ?></td>
                                <td><?= $row['katnama']; ?></td>
                                <td>
                                    <a href="" class="btn btn-warning">update</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                       <?php endforeach; ?>
                    </tbody>
            </table>
                            <div class="float-center">
                                <?= $pager->links('kategori','paging_data'); ?>
                            </div>
        </div>



    </div>



    <div class="viewmodal" style="display: none ;"></div>

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
    </script>
</section>

<?= $this-> endsection(); ?>