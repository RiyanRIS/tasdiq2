<?php
$cfg = new \SConfig();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?= view('template/head') ?>
  <style>
    ::placeholder {
      color: white !important;
    }
  </style>
</head>

<body id="page-top">
  <?= view('template/nav') ?>
  <!-- Carousel-->
  <div id="home" class="carousel slide" data-ride="carousel" style="padding-top: 50px!important">
    <ol class="carousel-indicators">
      <?php foreach ($banner as $key => $v) { ?>
        <li data-target="#home" data-slide-to="<?= $key ?>" class="<?= ($key == 0 ? 'active' : '') ?>"></li>
      <?php } ?>
    </ol>

    <div class="carousel-inner">
      <?php foreach ($banner as $key => $v) { ?>
        <div class="carousel-item <?= ($key == 0 ? 'active' : '') ?>">
          <img class="img-slide" src="<?= base_url('uploads/banner/' . $v->file) ?>" alt="<?= $v->nama ?>" style="width: 100%;">
          <div class="carousel-caption d-none d-md-block">
            <h5><?= $v->nama ?></h5>
          </div>
        </div>
      <?php } ?>

    </div>
    <a class="carousel-control-prev" href="#home" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#home" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- Visi Misi -->
  <section class="page-section" id="visi_misi">
    <div class="container">
      <!-- HEADING -->
      <h2 class="page-section-heading text-center text-uppercase mb-0">Visi & Misi</h2>
      <div class="divider-custom divider-dark">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>

      <figure class="text-center" style="max-height: 350px; min-height: 350px; overflow: scroll">
        <blockquote class="blockquote">
          <p id="visi-misi-layout" class="text-left" style="font-size: 1.1em!important;"><?= $info->visi ?></p>
        </blockquote>
      </figure>

      <div class="m-0 row justify-content-center d-flex" style="">
        <button data-status="yes" data-click="on" id="visi-btn" class="w-25 m-1 btn border shadow btn-primary" type="Button">VISI</button>
        <button data-click="off" id="misi-btn" class="w-25 m-1 btn border shadow btn-light" type="button">MISI</button>
      </div>

    </div>
  </section>

  <!-- Struktur-->
  <section class="page-section portfolio bg-customs" id="struktur_kepengurusan">
    <div class="container" id="parent_struktur">
      <!-- Portfolio Section Heading-->
      <h2 class="page-section-heading text-center text-uppercase text-light mb-0">Struktur Kepengurusan</h2>
      <!-- Icon Divider-->
      <div class="divider-custom divider-light mb-3">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Struktur Grid Items-->
      <!-- Pengurus Inti-->
      <div class="py-3" id="pengurus_inti_h4">

      </div>

      <section id="pengurus_inti" class="p-2 row justify-content-center">

      </section>

    </div>
  </section>

  <!-- Galeri-->
  <section class="page-section text-dark mb-0" id="galeri">

    <div class="container justify-content-center">
      <!-- HEADING -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Galeri</h2>
      <div class="divider-custom divider-dark">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <div class="splide border bg-info px-0 py-0 col-md-10 col-lg-6 mx-auto justify-content-center border shadow">
        <div class="splide__arrows">
          <button class="splide__arrow splide__arrow--prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
              <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
            </svg>
          </button>
          <button class="splide__arrow splide__arrow--next">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
              <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
            </svg>
          </button>
        </div>
        <section class="">
          <div class="splide__track">
            <ul class="splide__list">
              <li class="splide__slide justify-content-center">
                <img class="w-100" src="assets/img/galery/1.jpeg" height="300" alt="slide" />
              </li>
              <li class="splide__slide">
                <img class="w-100" src="assets/img/galery/2.jpeg" height="300" alt="slide" />
              </li>
              <li class="splide__slide">
                <img class="w-100" src="assets/img/galery/3.jpeg" height="300" alt="slide" />
              </li>
              <li class="splide__slide">
                <img class="w-100" src="assets/img/galery/4.jpeg" height="300" alt="slide" />
              </li>
            </ul>
          </div>
        </section>
      </div>

    </div>
  </section>

  <!-- Kontak-->
  <section class="page-section bg-customs text-light" id="kontak">
    <div class="container">
      <!-- Contact Section Heading-->
      <h2 class="page-section-heading text-center text-uppercase text-light mb-0">Kontak</h2>
      <!-- Icon Divider-->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Contact Section Form-->
      <div class="row text-light">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nama</label>
                <input class="form-control2 form-control" id="name_sender" type="text" placeholder="Nama" required="required" data-validation-required-message="Please enter your name." />
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Instansi</label>
                <input class="form-control2 form-control" id="instansi_sender" type="text" placeholder="Instansi" required="required" data-validation-required-message="Please enter your email address." />
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Pesan</label>
                <textarea class="form-control2 form-control" id="message_sender" rows="5" placeholder="Pesan" required="required" data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br />
            <div id="success"></div>
            <div class="form-group"><a class="btn btn-primary btn-xl" id="btn_send" role="button" href="https://api.whatsapp.com/send?phone=<?= $cfg->_waAdmin ?>&text=">Send</a></div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <?= view('template/foot') ?>
  <?= view('template/script') ?>

  <script>
    let height = screen.height;
    let total = height * 85 / 100
    $('.img-slide').css('height', total)
  </script>
</body>

</html>