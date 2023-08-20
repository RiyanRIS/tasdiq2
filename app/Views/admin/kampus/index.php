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
            <div class="col-lg-8">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">List Kampus</h3>
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
                        <th>ALAMAT</th>
                        <th>LINK</th>
                        <th>LOGO</th>
                        <th>AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($kampus != null) {
                        foreach ($kampus as $key => $v) { ?>
                          <tr>
                            <td><?= ++$key ?></td>
                            <td><?= strtoupper($v->nama_kampus) ?></td>
                            <td><?= $v->alamat_kampus ?></td>
                            <td><a href="<?= $v->link_kampus ?>"><?= $v->link_kampus ?></a></td>
                            <td><img src="<?= base_url('uploads/kampus/' . $v->file) ?>" alt="<?= $v->nama_kampus ?>" style="height:64px"></td>
                            <td>
                              <a onclick="return confirm('Hapus Data?\nTindakan ini tidak dapat diurungkan.')" href="<?= site_url('admin/kampus/hapus/' . $v->id_kampus) ?>" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                      <?php }
                      } ?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>

            <!-- FORM Kampus -->
            <form method="post" action="tambah" data-refresh="refresh" data-url="<?= site_url("admin/kampus/tambah") ?>" id="myForm" enctype="multipart/form-data" accept-charset="utf-8" class="col-lg-4">
              <div class="card card-success">

                <div class="card-header">
                  <h3 class="card-title">Tambah Kampus</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>

                <div class="card-body">
                  <div class="form-group" id="notifikasi_nama_kampus">
                    <label for="nama_kampus">Nama Kampus</label>
                    <input type="text" class="form-control" id="nama_kampus" name="nama_kampus" placeholder="Masukkan Nama Kampus" required="true" autocomplete="off" style="text-transform: uppercase;">
                  </div>

                  <div class="form-group" id="notifikasi_alamat_kampus">
                    <label for="alamat_kampus">Alamat Kampus</label>
                    <input type="text" class="form-control" id="alamat_kampus" name="alamat_kampus" placeholder="Masukkan Alamat Kampus" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_link_kampus">
                    <label for="link_kampus">Link Kampus</label>
                    <input type="text" class="form-control" id="link_kampus" name="link_kampus" placeholder="Masukkan Link Kampus" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_file">
                    <label for="file">File</label>
                    <input type="file" class="form-control" id="file" name="file" placeholder="Masukkan File" required="true" autocomplete="off">
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