
<?= $this-> extend('layout/template'); ?>
<?= $this-> section('content'); ?>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 bt-10">
                    <div class="col-sm-6 bt-6">
                        <h1 class="m-0">Data Barang</h1>
                    </div>
                    







                    
                    <table class="table tb-2">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">id</th>
                            <th scope="col">Gambar Barang</th>
                            <th scope="col">Nama Brang</th>
                            <th scope="col">slug</th>
                            <th scope="col">jumlah barang</th>
                    </tr>
                    </thead>



                    <tbody>

                        <?php 
                        foreach ($barang as $b) { ?>
                            <tr>
                                <th scope="row">1</th>
                                <td><?= $b['id'];?></td>
                                <td><img src="/img/<?= $b['gambar_barang'];?>" alt="" class="gambar"></td>
                                <td><?= $b['nama_barang']; ?></td>
                                <td><?= $b['slug']; ?></td>
                                <td><?= $b['jumlah_barang']; ?></td>
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

<?= $this-> endsection(); ?>