<?= $this->extend('layout/menu') ?>

<?= $this->section('judul') ?>
<h3>Manajemen Data Pelanggan</h3>
<?= $this->endSection() ?>


<?= $this->section('isi') ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-sm btn-primary tombolTambah">
                    <i class="fa fa-plus"></i> 
                </button>
                <button type="button" class="btn btn-sm btn-primary tombolTambah">
                    <i class="fa fa-plus"></i> Tambah 
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
                                <button type="buttom" class="btn btn-outline-danger btn-sm" onclick="hapus('<?= $row['pel_kode'] ?>','<?= $row['pel_nama'] ?>')">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                                <button type="buttom" class="btn btn-outline-info btn-sm" onclick="window.location='/pelanggan/edit/<?= $row['pel_kode'] ?>'">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
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
// function hapus (kode, nama) {
//     Swal.fire ({
//         html: `yakin menghapus data pelanggan dengan nama <strong>${nama}</strong> ini ? `,
//         text: "hapus",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d5',
//         cancelButtonColor: '#d33',
//         confirmButtontext: 'ya, Hapus',
//         cancelButtontext: 'Tidak',
    
        
//     }). then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 type: "post",
//                 url: "<?= site_url('pelanggan/hapus')?>",

//                 data: {
//                     kode : kode
//                 },
//                 dataType: "json",
//                 success: function (response) {
//                     if (response.sukses) {
//                         Swal.fire({
//                             icon: 'success',
//                             title: 'Berhasil',
//                             text: 'response.sukses',
//                         }).then((result) => {
//                             if(result.isConfirmed){
//                                 window.location.reload();
//                             }
//                         })
//                     }    
//                 },
//                 error: function(xhr, thrownError) {
//                     alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
//                 }
//             });
            
//         }
//     })
// }
// </script>
<?= $this->endSection(); ?>









































