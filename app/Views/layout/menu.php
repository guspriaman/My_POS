<?= $this->extend('layout/template'); ?>
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
            <a href="<?= site_url('kategori/index');?>" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                Kategori
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/home/index" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                Gallery
                </p>
            </a>
        </li>
<?= $this->endsection(); ?>