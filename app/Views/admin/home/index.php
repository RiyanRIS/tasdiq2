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
          <!-- Laporan -->
          <div class="text-center">
            <img class="d-block mx-auto mb-4" src="/assets/img/gambar2.png" alt="" width="200">
          </div>
          <div class="text-justify">
            <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mahasiswa Gayo Lues Yogyakarta adalalah perkumpulan yang bergerak dalam
              bidang pendidikan serta wadah kekeluargaan bagi Masyarakat Gayo Lues terutama di
              Yogyakara dan seluruh masyarakat Gayo Lues pada umumnya. Perkumpulan ini
              digagas pada tahun 2001-2002 oleh saudara Mukhtarudin dan saudara Herman yang
              berlokasi di Mandalakrida Yogyakarta serta disaksikan oleh Dr. Adi Kelana.
              Kemudian perkumpulan ini baru di sahkan pada tanggal 28 Oktober 2003 dengan
              kesepakatan bersama serta memisahkan diri dari IKAMARA (Ikatan Mahasiswa dan
              Masyarakat Aceh Tenggara) sebagai perkumpulan induknya.
            </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Perkumpulan ini pada awalnya bernama IMAGAYO (Ikatan Mahasiswa Gayo
              Lues Yogyakarta) sampai tanggal 03 januari 2020. Kemudian organisasi ini
              berpindah nama menjadi Mahasiswa Gayo Lues Yogyakarta terhitung mulai tanggal
              03 Januari 2020. Setelah terbirnya hasil putusan Menteri Hukum Dan Hak Asasi
              Manusia Republik Indonesia yang memenberikan pengesahan Badan Hukum
              perkumpulan Mahasiswa Gayo Lues Yogyakarta berkedudukan di Kabupaten Bantul
              dan beralamat di Sonopakis Kidul nomor 148, RT/RW: 004/-, Desa Ngestiharjo,
              Kecamatan Kasihan, Kabupaten Bantul, sesuai salinan Akta Nomor 01 Tanggal 03
              Januari 2020 yang dibuat oleh DEASY WIDYA SARI S.H., M.KN., yang
              berkedudukan di Kabupaten Bantul yang belaku sejak tanggal 23 januari 2020.
            </p>
          </div>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="modalnya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modallabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="tambah" data-url="<?= site_url("admin/angkatan/tambah") ?>" data-refresh="refresh" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="modal-body">
              <input type="hidden" name="id" id="id" />
              <div class="form-group" id="notifikasi_angkatan">
                <label for="angkatan">Angkatan<small style="color:red;vertical-align: top;">*</small></label>
                <input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="2022/2023" required="true" autocomplete="off">
              </div>
              <div class="form-group" id="notifikasi_tahun">
                <label for="tahun">Tahun<small style="color:red;vertical-align: top;">*</small></label>
                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="2022" required="true" autocomplete="off">
              </div>
              <div class="form-group" id="notifikasi_status">
                <label for="status">Status<small style="color:red;vertical-align: top;">*</small></label>
                <select name="status" class="form-control form-select mb-3" id="status" required="true">
                  <option value="1" id="select-satu">Aktif</option>
                  <option value="0" id="select-dua">Tidak Aktif</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" id="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?= view("admin/templates/foot") ?>

  </div>
  <!-- ./wrapper -->
  <?= view("admin/templates/script") ?>
  <script>
    $(".tambahModal").click(function() {
      $('#modalnya .modal-header #modallabel').text('Tambah Angkatan')
      $('#modalnya #myForm').attr('data-url', '<?= site_url("admin/angkatan/tambah") ?>')
      $('#modalnya #myForm').trigger('reset')
      $('#modalnya').modal('show')
    })

    $('#datatable.table-angkatan tbody').on('click', '.cell', async function() {
      var id = $(this).data("id")
      var data = await $.get('<?= site_url('admin/angkatan/get/') ?>' + id)
      data = JSON.parse(data)
      $('#modalnya .modal-header #modallabel').text('Ubah Angkatan')
      $('#modalnya #myForm').attr('data-url', '<?= site_url("admin/angkatan/ubah/") ?>' + id)
      $('#id').val(id)
      $('#angkatan').val(data.angkatan)
      $('#tahun').val(data.tahun)
      if (data.status == 1) {
        $('#status').val('1')
      } else {
        $('#status').val('0')
      }
      $('#modalnya').modal('show')
    });
  </script>
</body>

</html>