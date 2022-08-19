
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
                            <th scope="col">id</th>
                            <th scope="col">nama pic</th>
                            <th scope="col">alamat pic</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($lokasi as $l) { ?>
                       
                            <tr>
                                <th scope="row">1</th>
                                <td><?= $l['id']; ?></td>
                                <td><?= $l['nama_pic']; ?></td>
                                <td><?= $l['alamat_lokasi']; ?></td>
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