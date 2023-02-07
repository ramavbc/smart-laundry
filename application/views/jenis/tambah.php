<?=$this->session->flashdata('flash') ?>
<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-12">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4 font-weight-bold"><i class="fas fa-fw fa-tshirt"></i> Tambah <?=$section ?> Cucian</h1>
            </div>
            <form class="jenis" method="POST" action="<?=base_url('admin/jenis/save')?>">
              <div class="form-group mb-3">
                <label class="text-dark">Jenis</label>
                <input type="text" class="form-control" placeholder="Masukkan Jenis Laundry" name="jenis" value="<?=set_value('jenis') ?>">
                <?=form_error('jenis', "<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Harga/Kg</label>
                <input type="number" class="form-control" placeholder="Masukkan Harga" name="harga" value="<?=set_value('harga') ?>">
                <?=form_error('harga',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="d-flex">
                <button type="submit" class="btn btn-primary mr-3">Tambah</button>
                <a href="<?=base_url('admin/jenis') ?>" class="btn btn-secondary btn-md">Kembali</a>      
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>