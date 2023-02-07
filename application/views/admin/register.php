<body id="page-top" class="bg-gradient-primary">

<div class="container mt-5">
<!-- Outer Row -->
<div class="row justify-content-center mt-5 pt-lg-5">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg">
          <div class="card-body p-lg-5 p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                  <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                  <div class="col-lg-6">
                      <div class="p-5">
                          <div class="text-center mb-4">
                              <h1 class="h4 text-gray-900">REGISTER AKUN</h1>
                          </div>
                          <form class="user" method="POST" action="<?=base_url('admin/auth/register')?>"> 
                            <?=$this->session->flashdata('flash') ?>   
                            <div class="form-group">
                                <input type="nama" name="nama" class="form-control form-control-user" placeholder="Nama Lengkap">
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="alamat" name="alamat" class="form-control form-control-user" placeholder="Alamat Lengkap">
                                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="telp" name="telp" class="form-control form-control-user" placeholder="No Telp">
                                <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>" type="text" name="username" class="form-control form-control-user" placeholder="Username">
                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password1" class="form-control form-control-user" placeholder="Password">
                                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password2" class="form-control form-control-user" placeholder="Ulangi Password">
                                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Daftar
                            </button>
                            <hr>
                            <div class="text-center">
                                <a href="<?= base_url('admin/login'); ?>" class="small">Login</a>
                            </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>
</div>