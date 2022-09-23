
<?= $this-> extend('layout/menu'); ?>
<?= $this-> section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 bt-10">
                <div class="col-sm-3 bt-3">
                    <h1 class="m-0 ">Data Item</h1>
                    <a href="<?= base_url('item/create')?>" class="btn btn-primary btn-flat my-3">
                        <i class="fa fa-user-plus"></i>Tambah Data
                    </a>

                    <a href="<?php base_url('item/gus');?>" class="btn btn-primary"> gus</a>
                </div>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gambar Item</th>
                            <th scope="col">Nama Item</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Stok Item</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>


                    
                    <tbody>
                        <?php $a = 1; ?>
                        <?php 
                        foreach ($item as $i) { ?>
                            <tr>
                                <th scope="row"><?= $a++; ?></th>
                                <td><img src="/img/<?= $i['gambar_item'];?>" alt="" class="gambar"></td>
                                <td><?= $i['nama_item']; ?></td>
                                <td><?= $i['slug']; ?></td>
                                <td><?= $i['stok_item']; ?></td>
                                <td>
                                    <a href="/item/<?=$i['slug'];?>" class="btn btn-success">Detail</a>
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