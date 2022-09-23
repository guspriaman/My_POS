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
            <a href="<?= site_url('');?>" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                Kategori
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('#')?>" class="nav-link">
                <i class="nav-icon fas fa-box"></i>
                <p>
                Produk
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
            <a href="<?= base_url('')?>" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                Item
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

<?= $this->endsection(); ?>