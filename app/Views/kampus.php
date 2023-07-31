<?php
$cfg = new \SConfig();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?= view('template/head') ?>
</head>

<body id="page-top">
  <?= view('template/nav2') ?>
  <section class="page-section text-dark mb-0 mt-5" id="">

    <div class="container justify-content-center">
      <!-- HEADING -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Informasi Kampus</h2>
      <div class="divider-custom divider-dark">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <div class="container">
        <div class="table-responsive">

          <table class="table table-bordered">
            <tr>
              <th>No</th>
              <th>Nama Kampus</th>
              <th>Alamat Kampus</th>
              <th>Logo Kampus</th>
            </tr>
            <?php foreach ($kampus as $key => $v) { ?>
              <tr>
                <td><?= ++$key ?></td>
                <td><?= $v->nama_kampus ?></td>
                <td><?= $v->alamat_kampus ?></td>
                <td><img src="<?= base_url('uploads/kampus/' . $v->file) ?>" alt="<?= $v->nama_kampus ?>" style="height:64px"></td>
              </tr>
            <?php } ?>

          </table>
        </div>

      </div>
    </div>
  </section>

  <?= view('template/foot') ?>
  <?= view('template/script') ?>

  <script>

  </script>
</body>

</html>