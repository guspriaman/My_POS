
<?= $this-> extend('layout/template'); ?>
<?= $this-> section('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form tambah data produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/produk')?>">Back</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


<div class="card card-info my-3">

    <form action="<?= base_url('/produk/save')?>" method="post">
        <?= csrf_field(); ?>
        <div class="card-body">
            <div class="form-group row">
                <label for="gambar_produk" class="col-sm-2 col-form-label">Gambar Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="gambar_produk"name="gambar_produk" placeholder="Upload Gambar Produk" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="kode_produk" class="col-sm-2 col-form-label">Kode Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Input Nama Produk">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Input Nama Produk">
                </div>
            </div>
            <div class="form-group row">
                <label for="slug" class="col-sm-2 col-form-label">slug</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Input Nama Produk">
                </div>
            </div>
          
            <div class="form-group row">
                <label for="stok_produk" class="col-sm-2 col-form-label">Stok Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="stok_produk" name="stok_produk" placeholder="Input Stok Produk">
                </div>
            </div>

            <a type="submit" class="btn btn-info float-right">Create</a>
        </div>

    </form>
</div>
  


<?= $this->endsection(); ?>