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
            <p><a class="btn btn-lg btn-primary" href="login" role="button">Login</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-primary" href="daftar" role="button">Daftar</a></p>
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
  <?= view('template/foot') ?>
  <?= view('template/script') ?>

  <script>
    let height = screen.height;
    let total = height * 85 / 100
    $('.img-slide').css('height', total)
  </script>
</body>

</html>