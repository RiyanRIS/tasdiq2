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
        <div class="container">
          <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="<?=$cfg->_logoSekolah?>" alt="" width="72" height="72">
            <h3>Formulir Pendaftaran Anggota</h3>
          </div>
          <form method="post" action="">
            <div class="row">
              <div class="mb-3 col-md-12">
                <label for="firstName">Nama Lengkap</label>
                <input type="text" class="form-control <?=(@!$err['nama'] ? "" : "is-invalid")?>" name="nama" id="firstName" placeholder="" value="<?=@$post['nama']?>" required>
                <div class="invalid-feedback">
                  <?=@$err['nama']?>
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="tmpt_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir" placeholder="" value="<?=@$post['tmpt_lahir']?>" required>
                <div class="invalid-feedback">
                  <?=@$err['tmpt_lahir']?>
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="" value="<?=@$post['tgl_lahir']?>" required>
                <div class="invalid-feedback">
                  <?=@$err['tgl_lahir']?>
                </div>
              </div>

              <div class="d-block my-3 col-md-6">
                <label>Jenis Kelamin</label>
                <div class="custom-control custom-radio">
                  <input id="laki" name="jenis_kelamin" type="radio" class="custom-control-input" value="Laki-laki" checked required>
                  <label class="custom-control-label" for="laki">Laki-laki</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="perem" name="jenis_kelamin" type="radio" class="custom-control-input" value="Perempuan" required>
                  <label class="custom-control-label" for="perem">Perempuan</label>
                </div>
                <div class="invalid-feedback">
                  <?=@$err['jenis_kelamin']?>
                </div>
              </div>

              <div class="mb-3 col-md-6">
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
                <div class="invalid-feedback">
                  <?=@$err['agama']?>
                </div>
              </div>

              <div class="mb-3 col-md-12">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="" value="<?=@$post['alamat']?>" required>
                <div class="invalid-feedback">
                  <?=@$err['alamat']?>
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="asl_sekolah">Sekolah Asal</label>
                <input type="text" class="form-control" name="asl_sekolah" id="asl_sekolah" placeholder="" value="<?=@$post['asl_sekolah']?>" required>
                <div class="invalid-feedback">
                  <?=@$err['asl_sekolah']?>
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="jurusan">Jurusan</label>
                <select class="custom-select d-block w-100" name="jurusan" id="jurusan" required>
                    <option value="">--- Pilih Jurusan ---</option>
                    <option value="IPA">IPA</option>
                    <option value="IPS">IPS</option>
                  </select>
                <div class="invalid-feedback">
                  <?=@$err['jurusan']?>
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="" value="<?=@$post['email']?>" required>
                <div class="invalid-feedback">
                  <?=@$err['email']?>
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="no_tlpn">No. Telepon</label>
                <input type="text" class="form-control" name="no_tlpn" id="no_tlpn" placeholder="" value="<?=@$post['no_tlpn']?>" required>
                <div class="invalid-feedback">
                  <?=@$err['no_tlpn']?>
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="" value="<?=@$post['username']?>" required>
                <div class="invalid-feedback">
                  <?=@$err['username']?>
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="" value="" required>
                <div class="invalid-feedback">
                  <?=@$err['password']?>
                </div>
              </div>

              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Daftar</button>
            </div>
          </form>

        </div>
        <div class="py-5"></div>

        <?= view('template/foot') ?>
        <?= view('template/script') ?>

        <script>
         
        </script>
    </body>
</html>
