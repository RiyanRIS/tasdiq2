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
  <?= view('template/nav2') ?>
  <!-- Carousel-->
  <!-- Galeri-->
  <section class="page-section text-dark mb-0 mt-5" id="organ">

    <div class="container justify-content-center">
      <!-- HEADING -->
      <div class="container">
        <div class="text-center">
          <img class="d-block mx-auto mb-4" src="<?= base_url() ?>/assets/img/gambar2.png" alt="" width="200">
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
      </div>
  </section>

  <?= view('template/foot') ?>
  <?= view('template/script') ?>

  <script>
    let height = screen.height;
    let total = height * 85 / 100
    $('.img-slide').css('height', total)
  </script>
</body>

</html>