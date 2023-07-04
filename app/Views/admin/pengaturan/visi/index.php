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
            <!-- FORM Berkas -->
            <form method="post" action="tambah" data-url="<?= site_url("admin/pengaturan/visi/tambah") ?>" id="myForm" enctype="multipart/form-data" accept-charset="utf-8" class="col-12">
              <div class="card card-success">

                <div class="card-header">
                  <h3 class="card-title">Visi & Misi</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group" id="notifikasi_visi">
                        <label for="visi">Visi</label>
                        <textarea name="visi" id="visi" cols="10" rows="5" class="form-control"><?= @$info->visi ?></textarea>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group" id="notifikasi_misi">
                        <label for="misi">Misi</label>
                        <textarea name="misi" id="misi" cols="10" rows="5" class="form-control"><?= @$info->misi ?></textarea>
                      </div>
                    </div>
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