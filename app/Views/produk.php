
<?= $this-> extend('layout/template'); ?>
<?= $this-> section('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 bt-10">
                <div class="col-sm-6 bt-6">
                    <h1 class="m-0">Data Lokasih</h1>
                </div>
                    
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gambar produk</th>
                            <th scope="col">Kode_produk</th>
                            <th scope="col">Nama_produk</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Stok_produk</th>

                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $a = 1; ?>
                        <?php 
                        foreach ($produk as $p) { ?>
                            
                            <tr>
                                <th scope="row"><?= $a++; ?></th>
                                <td><img src="/img/coffee/<?= $p['gambar_produk'];?>" alt="" class="gambar"></td>
                                <td><?= $p['kode_produk']; ?></td>
                                <td><?= $p['nama_produk']; ?></td>
                                <td><?= $p['slug']; ?></td>
                                <td><?= $p['stok_produk']; ?></td>
                                <td>
                                    <a href="" class="btn btn-success">Detail</a>
                                </td>
                            </tr>
                       <?php } ?>
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>
<?= $this-> endsection(); ?>