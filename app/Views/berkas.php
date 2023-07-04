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
  <div class="py-5"></div>
  <div class="py-5"></div>
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
  <div class="py-5"></div>

  <?= view('template/foot') ?>
  <?= view('template/script') ?>

  <script>

  </script>
</body>

</html>