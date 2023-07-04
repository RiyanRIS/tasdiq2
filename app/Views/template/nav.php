<?php
$cfg = new \SConfig();
?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav" style="background-color: #197513!important;">
  <div class="container">
    <img src="<?= $cfg->_logoSekolah ?>" alt="logo" class="image-fluid" width="50" height="50" />
    <p class="mb-0 text-light" style="font-size: 1.1em;"><?= $cfg->_namaOrganisasi ?></p>
    <button style="background-color: #197513!important;" class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded px-0 py-0" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <img src="assets/img/nav_right.png" width="50" alt="nav toggle icon" />
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item mx-0 mx-lg-2"><a class="nav-link py-2 px-0 px-lg-1 rounded js-scroll-trigger" href="#home">Home</a></li>
        <li class="nav-item mx-0 mx-lg-2"><a class="nav-link py-2 px-0 px-lg-1 rounded js-scroll-trigger" href="#visi_misi">Visi & Misi</a></li>
        <li class="nav-item mx-0 mx-lg-2"><a class="nav-link py-2 px-0 px-lg-1 rounded js-scroll-trigger" href="#pengurus_inti_h4">Struktur Kepengurusan</a></li>
        <li class="nav-item mx-0 mx-lg-2"><a class="nav-link py-2 px-0 px-lg-1 rounded js-scroll-trigger" href="#galeri">Galeri</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link py-2 px-0 px-lg-1 rounded dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <?php if (session()->isLogin) { ?>
              <li><a class="dropdown-item js-scroll-trigger" href="<?= site_url('berkas') ?>">Berkas</a></li>
              <li><a class="dropdown-item js-scroll-trigger" href="<?= site_url('kampus') ?>">Kampus</a></li>
              <li><a class="dropdown-item js-scroll-trigger" href="<?= site_url('ubah') ?>">Ubah Profil</a></li>
              <li><a class="dropdown-item js-scroll-trigger" href="<?= site_url('logout') ?>">Logout</a></li>
            <?php  } else { ?>
              <li><a class="dropdown-item js-scroll-trigger" href="<?= site_url('login') ?>">Login</a></li>
            <?php  } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>