<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Smart Laundry</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url('assets/users/')?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?=base_url('assets/users/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/users/')?>vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="<?=base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=base_url('assets/users/')?>css/landing-page.css" rel="stylesheet">

   <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>

  <style type="text/css">
    nav .active { color: #3fa1c6 !important; }
  </style>

</head>

<body>
<?php $hal = $this->uri->segment(1); ?>

  <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top p-3 shadow">
      <div class="container">
        <a class="navbar-brand font-weight-bold title" href="<?=base_url('')?>">Smart Laundry</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link font-weight-bold <?=($hal=='')?'active':''; ?>" href="<?=base_url('')?>">Home</a>
            <a class="nav-item nav-link font-weight-bold <?=($hal=='jenis')?'active':''; ?>" href="<?=base_url('jenis')?>">Jenis Cucian</a>
            <a class="nav-item nav-link font-weight-bold <?=($hal=='kontak')?'active':''; ?>" href="<?=base_url('kontak')?>">Kontak</a>
          </div>
        </div>
      </div>
    </nav>

    <?php 
      if(!defined('BASEPATH')) exit ('No direct script access allowed');
      if($content){$this->load->view($content);}
    ?>

  <!-- Footer -->
    <footer class="footer" style="">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto text-white">
            <ul class="list-inline mb-2 ">
              <li class="list-inline-item ">
                <a class="text-light font-weight-bold <?=($hal=='')?'active':''; ?>" href="<?=base_url('')?>">Home</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a class="text-light font-weight-bold <?=($hal=='jenis')?'active':''; ?>" href="<?=base_url('jenis')?>">Jenis Cucian</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a class="text-light font-weight-bold <?=($hal=='kontak')?'active':''; ?>" href="<?=base_url('kontak')?>">Kontak</a>
              </li>
            </ul>
            <span>Script and Design by</span>
            <a class="copyright text-dark" role="button" data-toggle="modal" href="#developerModal">
                <b><span>Nevermore</span></b>
            </a>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right mb-auto">
            <h2 class="text-light mb-4">Find Us On</h2>
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3" id="sosmed-1">
                <a href="#">
                  <i class="fab fa-facebook fa-2x fa-fw text-light" title="Facebook"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3" id="sosmed-2">
                <a href="#">
                  <i class="fab fa-twitter-square fa-2x fa-fw text-light" title="Twitter"></i>
                </a>
              </li>
              <li class="list-inline-item" id="sosmed-3">
                <a href="#">
                  <i class="fab fa-instagram fa-2x fa-fw text-light" title="Instagram"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer> 

      <!-- Developer Modal-->
  <div class="modal fade" id="developerModal" tabindex="-1" role="dialog" aria-labelledby="developerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="developerModalLabel">Website License</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Website Version 1.0</p>
                <p>Licensed to:</p>
                <p>Smart Laundry</p>
                <hr>
                <p>Design and system of this website are protected by copyright. Some images and other materials credit goes to its respective owners.</p>
                <div>
                  Contact Us :
                </div>
                <div>
                  <a class="nav-item active" role="button" href="mailto:agrisyahrial@outlook.com" target="_blank">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Email</span>
                  </a>
                </div>
                <div>
                  <a class="nav-item active" role="button" href="https://www.facebook.com/smittywerbenmanjansen/" target="_blank">
                    <i class="fab fa-fw fa-facebook-square"></i>
                    <span>Facebook</span>
                  </a>
                </div>
                <div>
                  <a class="nav-item active" role="button" href="https://www.instagram.com/griagri_/" target="_blank">
                    <i class="fab fa-fw fa-instagram"></i>
                    <span>Instagram</span>
                  </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url('assets/users/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/users/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Page data table -->
  <script src="<?=base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url('assets/') ?>js/demo/datatables-demo.js"></script>

</body>

</html>
