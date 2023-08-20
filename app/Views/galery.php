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
  <?= view('template/nav2') ?>
  <!-- Carousel-->
  <!-- Galeri-->
  <section class="page-section text-dark mb-0 mt-5" id="galeri">

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
              <?php foreach ($galeri as $key => $v) { ?>
                <li class="splide__slide">
                  <img class="w-100" src="<?= base_url('uploads/galeri/' . $v->file) ?>" height="300" alt="slide" />
                </li>
              <?php } ?>
            </ul>
          </div>
        </section>
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