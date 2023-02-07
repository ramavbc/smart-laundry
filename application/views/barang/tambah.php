<?=$this->session->flashdata('flash') ?>
<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-12">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4 font-weight-bold"><i class="fas fa-fw fa-box-open"></i> Tambah <?=$section ?></h1>
            </div>
            <form class="barang" method="POST" action="<?=base_url('admin/barang/save')?>">
              <div class="form-group mb-3">
                <label class="text-dark">Supplier</label>
                <select class="form-control text-dark" name="supplier">
                    <option  value="">Pilih Supplier</option>   
                    <?php foreach($suppliers as $sp):?>
                        <option value="<?php echo $sp->nama; ?>"><?php echo $sp->nama; ?></option>
                    <?php endforeach;?>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Nama Barang</label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Barang" name="nama" value="<?=set_value('nama') ?>">
                <?=form_error('nama',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Jumlah Barang</label>
                <input type="text" class="form-control" placeholder="Masukkan Jumlah Pembelian Barang" name="stok" value="<?=set_value('stok') ?>">
                <?=form_error('stok',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Harga Barang</label>
                <input type="text" class="form-control" placeholder="Masukkan Harga Barang" name="harga" value="<?=set_value('harga') ?>">
                <?=form_error('harga',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="d-flex">
                <button type="submit" class="btn btn-primary mr-3">Tambah</button>
                <a href="<?=base_url('admin/barang') ?>" class="btn btn-secondary btn-md">Kembali</a>      
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>