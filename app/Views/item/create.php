
<?= $this-> extend('layout/menu'); ?>
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
                        <li class="breadcrumb-item"><a href="<?= base_url('/item')?>">Back</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


<div class="card card-info my-3">

    <form action="<?= base_url('item/save')?>" method="post">
        <?= csrf_field(); ?>
        <div class="card-body">
            <div class="form-group row">
                <label for="gambar_item" class="col-sm-2 col-form-label">Gambar Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="gambar_item"name="gambar_item" placeholder="Upload Gambar Produk" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama_item" class="col-sm-2 col-form-label">Nama Item</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_item" name="nama_item" placeholder="Input Nama Item">
                </div>
            </div>
            <div class="form-group row">
                <label for="slug" class="col-sm-2 col-form-label">slug</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Input Nama Produk">
                </div>
            </div>
          
            <div class="form-group row">
                <label for="stok_item" class="col-sm-2 col-form-label">Stok Item</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="stok_item" name="stok_item" placeholder="Input Stok Item">
                </div>
            </div>

            <a type="submit" class="btn btn-info float-right">Create</a>
        </div>

    </form>
</div>
  


<?= $this->endsection(); ?>