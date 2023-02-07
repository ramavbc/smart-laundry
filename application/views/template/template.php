<?php include('header.php');

$hal    = $this->uri->segment(2);
$aktif  = 'active';

?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <i class="fab fa-fw fa-product-hunt"></i>
        </div>
        <div class="sidebar-brand-text mx-1">Smart Laundry</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active <?= ($hal == 'dashboard') ? $aktif : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Utama
      </div>
      <!-- Nav Item - Charts -->
      <li class="nav-item <?= ($hal == 'customer') ? $aktif : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/customer') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Customer</span>
        </a>
      </li>
      <!-- Nav Item - Charts -->
      <li class="nav-item <?= ($hal == 'jenis') ? $aktif : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/jenis') ?>">
          <i class="fas fa-fw fa-tshirt"></i>
          <span>Daftar Barang</span>
        </a>
      </li>
      <!-- Nav Item - Charts -->
      <li class="nav-item <?= ($hal == 'transaksi') ? $aktif : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/transaksi') ?>">
          <i class="fas fa-fw fa-coins"></i>
          <span>Transaksi</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <?php if ($this->session->userdata('level') == '1') : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
          Admin Panel
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item <?= ($hal == 'barang') ? $aktif : ''; ?>">
          <a class="nav-link" href="<?= base_url('admin/barang') ?>">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Persediaan</span>
          </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu Laporan -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie" aria-expanded="true" aria-controls="collapseUtilitie">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Laporan</span>
          </a>
          <div id="collapseUtilitie" class="collapse" aria-labelledby="headingUtilitie" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="<?= base_url('admin/laporan/laporan_customer') ?>">Laporan Customer</a>
              <a class="collapse-item" href="<?= base_url('admin/laporan/laporan_transaksi') ?>">Laporan Transaksi</a>
              <a class="collapse-item" href="<?= base_url('admin/laporan/laporan_barang') ?>">Laporan Barang</a>
            </div>
          </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu Account Manage-->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>Account Manage</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item <?= ($hal == 'user') ? $aktif : ''; ?>" href="<?= base_url('admin/user') ?>">User Manage</a>
              <a class="collapse-item <?= ($hal == 'supplier') ? $aktif : ''; ?>" href="<?= base_url('admin/supplier') ?>">Supplier Manage</a>
            </div>
          </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      <?php endif; ?>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama'); ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/avatar/user.png') ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <?php
          if (!defined('BASEPATH')) exit('No direct script access allowed');
          if ($content) {
            $this->load->view($content);
          }
          ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Script and Design by</span>
            <a class="copyright text-dark" role="button" data-toggle="modal" href="#developerModal">
              <b><span>Nevermore</span></b>
            </a>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log-out?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik "Logout" dibawah ini jika anda yakin ingin keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('admin/auth/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

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

  <?php include('footer.php') ?>