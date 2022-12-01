<?= $this->extend('layout/menu') ?>

<?= $this->section('judul') ?>
<h3>Manajemen Data Pelanggan</h3>
<?= $this->endSection() ?>


<?= $this->section('isi') ?>
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
            <div class="table-responsive">
                <form method="POST" action="/pelanggan/index">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Nama Pelanggan" name="caripelanggan"
                            autofocus value="<?= $cari; ?>">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="tombolpelanggan">Cari</button>
                        </div>
                    </div>
                </form>
    
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat Pelanggan</th>
                            <th>telp Pelanggan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
    
    
                    <tbody>
                    <?php 
                    $nomor = 1 + (($nohalaman - 1) * 10);
                    foreach($datapelanggan as $row);

                    ?>
                        <tr class="text-center">
                            <td><?= $nomor++; ?></td>
                            <td><?= $row['pel_kode']; ?></td>
                            <td><?= $row['pel_nama']; ?></td>
                            <td><?= $row['pel_alamat']; ?></td>
                            <td><?= $row['pel_telp']; ?></td>
                            <td>
                                
                            </td>
                        </tr>
                </tbody>
                </table>
    
                <div class="float-center">
                    <?= $pager->links('pelanggan', 'paging_data'); ?>
                </div>
            </div>
    
    
        </div>
    </div>
<div class="viewmodal" style="display: none;"></div>




<script>
$(document).ready(function() {
    
    $('.tombolTambah').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= site_url('pelanggan/formTambah') ?>",
            dataType: "json",
            type: 'post',
            data: {
                aksi: 0
            },
            success: function(response) {
                if (response.data) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaltambahpelanggan').on('shown.bs.modal', function(event) {
                        $('#namakategori').focus();
                    });
                    $('#modaltambahpelanggan').modal('show');
                }
            },
            error: function(xhr, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
});

// </script>
<?= $this->endSection(); ?>









































