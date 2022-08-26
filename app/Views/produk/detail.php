
<?= $this-> extend('layout/template'); ?>
<?= $this-> section('content'); ?>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/produk">Back</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">                    
                    <div class="card mb-3" style="max-width: 540px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="/img/<?= $produk['gambar_produk']; ?>" class="card-img" alt="">
                        </div>
                        <div class="col-md-6">
                          <div class="card-body">
                            <h5 class="card-title"><?= $produk['nama_produk']; ?></h5><br>
                            <p class="card-text"><b>Kode Produk : </b><?= $produk['kode_produk']; ?></p>
                            <p class="card-text"><b>Stok Produk : </b><?= $produk['stok_produk']; ?></p>
                            <a href="" class="btn btn-warning">edit</a>
                            <a href="" class="btn btn-danger">delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this-> endsection(); ?>