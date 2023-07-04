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
  <div class="py-5"></div>

  <?= view('template/foot') ?>
  <?= view('template/script') ?>

  <script>

  </script>
</body>

</html>