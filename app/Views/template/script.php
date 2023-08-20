<?php
$cfg = new \SConfig();
?>
<script>
  let base_url = '<?= site_url() ?>'
</script>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!-- Core theme JS-->
<script src="<?= base_url('assets') ?>/js/scripts.js"></script>
<!-- JQUERY NON MINIFIED -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- MY JS SCRIPT -->
<script src="<?= base_url('assets') ?>/js/render_ajax.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets') ?>/js/wa_autotext.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets') ?>/js/event_button.js" type="text/javascript" charset="utf-8"></script>
<!-- SPLIDE -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script src="<?= base_url('assets') ?>/js/slide_show.js" type="text/javascript" charset="utf-8"></script>

<!-- Notifications Plugin -->
<script src="<?= base_url('assets/') ?>plugins/toastr/toastr.min.js"></script>

<!-- JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<script>
  <?php if (session()->has('msg')) {
    if (session()->get('msg')[0] == 1) { ?>
      toastr.success("<?= session()->get('msg')[1] ?>", 'Berhasil');
    <?php } elseif (session()->get('msg')[0] == 0) { ?>
      toastr.error("<?= session()->get('msg')[1] ?>", 'Gagal');
  <?php }
  } ?>
</script>