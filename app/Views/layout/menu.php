<?= $this->extend('layout/main'); ?>
<?= $this->section('menu'); ?>



          <li class="nav-item">
            <a href="<?= site_url();?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
            </p>
            </a>
          </li>
         
        <li class="nav-item">
<<<<<<< HEAD
            <a href="<?= site_url('kategori/index')?>" class="nav-link">
=======
            <a href="<?= site_url('kategori/index');?>" class="nav-link">
>>>>>>> tutorcrudci4
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                Kategori
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('produk/index')?>" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                Produk
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="<?= base_url('satuan/index')?>" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                    Satuan
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="<?= site_url('')?>" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                customer
                </p>
            </a>
        </li>

        
        <li class="nav-item">
            <a href="<?= site_url('suplier/index')?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                Suplier
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('pelanggan/index')?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                Pelanggan
                </p>
            </a>
        </li>

<?= $this->endsection(); ?>