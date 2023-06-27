<?php
$cfg = new \SConfig();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?= view('template/head') ?>
    <style>
      #form-daftar .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      #form-daftar .form-signin .checkbox {
        font-weight: 400;
      }
      #form-daftar .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }
      #form-daftar .form-signin .form-control:focus {
        z-index: 2;
      }
      #form-daftar .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      #form-daftar .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>
  </head>
    <body id="page-top">
        <?= view('template/nav2') ?>
        <div class="py-5"></div>
        <div class="container" id="form-daftar">
        <form class="form-signin py-5">
          <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
          <label for="inputEmail" class="sr-only">Username</label>
          <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required="" autofocus="">
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          <p class="mt-5 mb-3 text-muted">Belum Punya Akun? <a href="daftar">Klik disini</a></p>
        </form>

        </div>
        <div class="py-5"></div>

        <?= view('template/foot') ?>
        <?= view('template/script') ?>

        <script>
         
        </script>
    </body>
</html>
