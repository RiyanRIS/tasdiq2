<!DOCTYPE html>
<html lang="en">

<head>
  <?= view("admin/templates/head") ?>
  <!-- CSS -->
  <!-- TUTUP CSS -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?= view("admin/templates/atas") ?>
    <?= view("admin/templates/nav") ?>
    <div class="content-wrapper">
      <?= view("admin/templates/breadcump") ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- TABEL berkas peserta -->
            <div class="col-8">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">List Banner</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>

                <div class="card-body">
                  <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>NAMA</th>
                        <th>FOTO</th>
                        <th>AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($banner != null) {
                        foreach ($banner as $key => $v) { ?>
                          <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $v->nama ?></td>
                            <td><img src="<?= base_url('uploads/banner/' . $v->file) ?>" alt="<?= $v->nama ?>" style="height:64px"></td>
                            <td>
                              <a onclick="return confirm('Hapus Data?\nTindakan ini tidak dapat diurungkan.')" href="<?= site_url('admin/pengaturan/banner/hapus/' . $v->id_banner) ?>" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                      <?php }
                      } ?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>

            <!-- FORM Berkas -->
            <form method="post" action="tambah" data-refresh="refresh" data-url="<?= site_url("admin/pengaturan/banner/tambah") ?>" id="myForm" enctype="multipart/form-data" accept-charset="utf-8" class="col-4">
              <div class="card card-success">

                <div class="card-header">
                  <h3 class="card-title">Tambah Banner</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>

                <div class="card-body">
                  <div class="form-group" id="notifikasi_nama">
                    <label for="nama">Nama Foto</label>
                    <input type="hidden" name="id" value="<?= @$record['id'] ?>">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Foto" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_file">
                    <label for="file">File</label>
                    <input type="file" class="form-control" id="file" name="file" placeholder="Masukkan File" required="true" autocomplete="off">
                    <small class="text-muted">*ukuran: 1280x718</small>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?= view("admin/templates/foot") ?>

  </div>
  <!-- ./wrapper -->
  <?= view("admin/templates/script") ?>

</body>

</html>