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
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Berkas</h2>
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
              <th>Nama Berkas</th>
              <th>Tanggal Terbit</th>
              <th>Link</th>
            </tr>
            <?php foreach ($berkas as $key => $v) { ?>
              <tr>
                <td><?= ++$key ?></td>
                <td><?= $v->nama ?></td>
                <td><?= date('d F Y', strtotime($v->upload_at)) ?></td>
                <td><a href="<?= base_url('upload/berkas/' . $v->file) ?>">Download</a></td>
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