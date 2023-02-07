<?=$this->session->flashdata('flash') ?>
<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-11">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4 font-weight-bold"><i class='fa fa-user-edit'></i> Update Data <?=$section ?></h1>
            </div>
            <form class="user" method="POST" action="<?=base_url('admin/user/update')?>">
              <?php foreach ($tampil as $t): ?>
                <div class="form-group mb-3">
                    <label class="text-dark">Username</label>
                    <input type="text" class="form-control" placeholder="Masukkan Username" name="username" value="<?=set_value('username',$t->username) ?>" readonly>
                    <?=form_error('username',"<small class='text-danger'>",'</small>') ?>
                </div>
                <div class="form-group mb-3">
                    <label class="text-dark">Nama</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" value="<?=set_value('nama', $t->nama) ?>">
                    <input type="hidden" name="oldNama" value="<?=$t->nama?>">
                    <?=form_error('nama', "<small class='text-danger'>",'</small>') ?>
                </div>
                <div class="form-group mb-3">
                    <label class="text-dark">Level</label>
                    <select class="form-control text-dark" name="level">
                    <option value="1" <?=($t->level=='1')?'selected':'' ?> <?=set_select('level', '1') ?>>Admin</option>
                    <option value="2" <?=($t->level=='2')?'selected':'' ?> <?=set_select('level', '2') ?>>Karyawan</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="text-dark">Alamat</label>
                    <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat" value="<?=set_value('alamat',$t->alamat) ?>">
                    <?=form_error('alamat',"<small class='text-danger'>",'</small>') ?>
                </div>
                <div class="form-group mb-3">
                    <label class="text-dark">Telp</label>
                    <input type="text" class="form-control" placeholder="Masukkan Telp" name="telp" value="<?=set_value('telp',$t->telp) ?>">
                    <?=form_error('telp',"<small class='text-danger'>",'</small>') ?> 
                </div>
                <div class="d-flex">
                <button type="submit" class="btn btn-primary mr-3">Update</button>
              <?php endforeach ?>
            </form>        
            <a href="<?=base_url('admin/user') ?>" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>