<?php
$cfg = new \SConfig();
?>
        <!-- Footer-->
        <footer class="footer text-center py-4">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-12 mb-5 mb-lg-5">
                        <h4 class="text-uppercase mb-4"><?=$cfg->_namaOrganisasi?></h4>
                        <p class="lead mb-0">
                            <?=$cfg->_alamatOrganisasi?>
                        </p>
                    </div>
                    <div class="col-lg-12 mb-5 mb-lg-5">
                      <a class="btn btn-outline-light btn-social mx-1" href="<?=$cfg->_sosmed['instagram']?>"><i class="fab fa-fw fa-instagram"></i></a>
                      <a class="btn btn-outline-light btn-social mx-1" href="<?=$cfg->_sosmed['youtube']?>"><i class="fab fa-fw fa-youtube"></i></a>
                      <a class="btn btn-outline-light btn-social mx-1" href="mailto:<?=$cfg->_sosmed['email']?>"><i class="far fa-envelope-open"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; <?=$cfg->_namaOrganisasi?> <?=date('Y')?></small></div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top  position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>