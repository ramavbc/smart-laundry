<?=$this->session->flashdata('flash') ?>
<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-12">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4 font-weight-bold"><i class='fa fa-user-plus'></i> Tambah Data <?=$section ?></h1>
            </div>
            <form class="user" method="POST" action="<?=base_url('admin/user/save')?>">
              <div class="form-group mb-3">
                <label class="text-dark">Nama</label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama" value="<?=set_value('nama') ?>">
                <?=form_error('nama', "<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Username</label>
                <input type="text" class="form-control" placeholder="Masukkan Username" name="username" value="<?=set_value('username') ?>">
                <?=form_error('username',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group row pb-3">
                <div class="col-sm-6 ">
                  <label class="text-dark">Password</label>
                  <input type="password" class="form-control" placeholder="Masukkan Password" name="password1">
                   <?=form_error('password1',"<small class='text-danger'>",'</small>') ?> 
                </div>
                <div class="col-sm-6">
                  <label class="text-dark">Ulangi Password</label>
                  <input type="password" class="form-control" placeholder="Ulangi Password" name="password2">
                </div>
              </div>
              <div class="form-group">
                <label class="text-dark">Level</label>
                <select class="form-control text-dark" name="level">
                  <option value="1" <?=set_select('level','1') ?> >Admin</option>
                  <option value="2" <?=set_select('level','2') ?> >Karyawan</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Alamat</label>
                <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat" value="<?=set_value('alamat') ?>">
                <?=form_error('alamat',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Telp</label>
                <input type="text" class="form-control" placeholder="Masukkan No Telp" name="telp" value="<?=set_value('telp') ?>">
                <?=form_error('telp',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="d-flex">
                <button type="submit" class="btn btn-primary mr-3">Tambah</button>
                <a href="<?=base_url('admin/user') ?>" class="btn btn-secondary btn-md">Kembali</a>      
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>