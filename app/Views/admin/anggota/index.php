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
            <!-- TABEL anggota -->
            <div class="col-sm-12">
              <a href="<?= site_url('admin/anggota/tambah') ?>" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Anggota</a>
            </div>
            <div class="col-sm-6">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">List Anggota</h3>
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
                        <th>ANGKATAN</th>
                        <th>NAMA</th>
                        <th>AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($anggota != null) {
                        foreach ($anggota as $key => $v) { ?>
                          <tr data-user="<?= $v->username ?>">
                            <td><?= ++$key ?></td>
                            <td><?= $v->angkatan ?></td>
                            <td><?= $v->nama ?></td>
                            <td>
                              <a onclick="return confirm('Hapus Data?\nTindakan ini tidak dapat diurungkan.')" href="<?= site_url('admin/anggota/hapus/' . $v->id_anggota) ?>" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
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
            <form method="post" action="tambah" data-refresh="refresh" data-url="<?= site_url("admin/anggota/tambah") ?>" id="myForm" enctype="multipart/form-data" accept-charset="utf-8" class="col-sm-6">
              <div class="card card-success">

                <div class="card-header">
                  <h3 class="card-title">Detail Anggota</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>

                <div class="card-body">
                  <div class="form-group" id="notifikasi_nama">
                    <label for="nama">Nama</label>
                    <input type="hidden" name="id_anggota" id="id_anggota">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anggota" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_tmpt_lahir">
                    <label for="tmpt_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" placeholder="Masukkan Tempat Lahir Anggota" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_tgl_lahir">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_tgl_lahir">
                    <label>Jenis Kelamin</label>
                    <div class="custom-control custom-radio">
                      <input id="laki" name="jenis_kelamin" type="radio" class="custom-control-input" value="Laki-laki" required>
                      <label class="custom-control-label" for="laki">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input id="perem" name="jenis_kelamin" type="radio" class="custom-control-input" value="Perempuan" required>
                      <label class="custom-control-label" for="perem">Perempuan</label>
                    </div>
                  </div>

                  <div class="form-group" id="notifikasi_tmpt_lahir">
                    <label for="agama">Agama</label>
                    <select class="custom-select d-block w-100" name="agama" id="agama" required>
                      <option value="">--- Pilih Agama ---</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Khatolik">Khatolik</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Konghuchu">Konghuchu</option>
                    </select>
                  </div>

                  <div class="form-group" id="notifikasi_alamat_asal">
                    <label for="alamat_asal">Asal</label>
                    <input type="text" class="form-control" id="alamat_asal" name="alamat_asal" placeholder="Masukkan Asal Anggota" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_alamat">
                    <label for="alamat">Domisili</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Domisili Anggota" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_asl_sekolah">
                    <label for="asl_sekolah">Kampus</label>
                    <input type="text" class="form-control" id="asl_sekolah" name="asl_sekolah" placeholder="Masukkan Kampus Anggota" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_jurusan">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukkan Jurusan Anggota" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_angkatan">
                    <label for="angkatan">Angkatan</label>
                    <input type="number" class="form-control" id="angkatan" name="angkatan" placeholder="Masukkan Angkatan Anggota" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_no_tlpn">
                    <label for="no_tlpn">No. Telepon</label>
                    <input type="text" class="form-control" id="no_tlpn" name="no_tlpn" placeholder="Masukkan No. Telepon Anggota" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_email">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Anggota" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_username">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Nama Anggota" required="true" autocomplete="off">
                  </div>

                  <div class="form-group" id="notifikasi_password">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Jika Merubah" autocomplete="off">
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button>
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
  <script>
    var table = $('#datatabletanpasearch').DataTable({
      searching: false
    });

    $('#datatable tbody').on('click', 'tr', function() {
      // var rowData = table.row(this).data();
      var rowData = $(this).data('user');
      if (rowData) {
        let username = rowData;
        $.getJSON('<?= site_url('api/anggota/') ?>' + username, function(anggota) {
          $('#id_anggota').val(anggota.id_anggota)
          $('#nama').val(anggota.nama)
          $('#alamat').val(anggota.alamat)
          $('#alamat_asal').val(anggota.alamat_asal)
          $('#tmpt_lahir').val(anggota.tmpt_lahir)
          $('#tgl_lahir').val(anggota.tgl_lahir)
          $('#asl_sekolah').val(anggota.asl_sekolah)
          $('#no_tlpn').val(anggota.no_tlpn)
          $('#email').val(anggota.email)
          $('#angkatan').val(anggota.angkatan)
          $('#jurusan').val(anggota.jurusan)
          $('#username').val(anggota.username)
          $('#agama').val(anggota.agama)

          if (anggota.jenis_kelamin == 'Laki-laki') {
            $('#laki').prop('checked', true);
          } else {
            $('#perem').prop('checked', true);

          }
          console.log(anggota)
        })
      }
    });
  </script>

</body>

</html>