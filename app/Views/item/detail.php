
<?= $this-> extend('layout/menu'); ?>

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
                        <li class="breadcrumb-item"><a href="/item">Back</a></li>
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
                          <img src="/img/<?= $item['gambar_item']; ?>" class="gambar" alt="">
                        </div>
                        <div class="col-md-6">
                          <div class="card-body">
                            <h5 class="card-title"><?= $item['nama_item']; ?></h5><br>
                            <p class="card-text"><b>Stok item : </b><?= $item['stok_item']; ?></p>
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