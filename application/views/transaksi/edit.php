<?=$this->session->flashdata('flash') ?>
<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-12">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4 font-weight-bold"><i class="fa fa-fw fa-edit"></i> Update Status <?=$section ?></h1>
            </div>
            <form class="transaksi" method="POST" action="<?=base_url('admin/transaksi/update')?>">
              <?php foreach ($tampil as $t): ?>
                <input type="hidden" name="id" value="<?=$t->id?>">
                <div class="form-group mb-3">
                    <label class="text-dark">Customer</label>
                    <input type="text" class="form-control" placeholder="" name="customer" value="<?=set_value('customer',$t->customer) ?>" readonly>
                    <?=form_error('customer',"<small class='text-danger'>",'</small>') ?>
                </div>
                <div class="form-group mb-3">
                    <label class="text-dark">Jenis</label>
                    <input type="text" class="form-control" placeholder="" name="jenis" value="<?=set_value('jenis', $t->jenis) ?>" readonly>
                    <?=form_error('jenis', "<small class='text-danger'>",'</small>') ?>
                </div>
                <div class="form-group mb-3">
                    <label class="text-dark">Berat</label>
                    <input type="text" class="form-control" placeholder="" name="berat" value="<?=set_value('berat',$t->berat) ?>" readonly>
                    <?=form_error('berat',"<small class='text-danger'>",'</small>') ?>
                </div>
                <div class="form-group mb-3">
                    <label class="text-dark">Tanggal Transkasi</label>
                    <input type="text" class="form-control" placeholder="" name="tgl_transaksi" value="<?=set_value('tgl_transaksi',$t->tgl_transaksi) ?>" readonly>
                    <?=form_error('tgl_transaksi',"<small class='text-danger'>",'</small>') ?>
                </div>
                <div class="form-group mb-3">
                    <label class="text-dark">Tanggal Ambil</label>
                    <input type="text" class="form-control" placeholder="" name="tgl_ambil" value="<?=set_value('tgl_ambil',$t->tgl_ambil) ?>" readonly>
                    <?=form_error('tgl_ambil',"<small class='text-danger'>",'</small>') ?>
                </div>
                <div class="form-group mb-3">
                    <label class="text-dark">Total</label>
                    <input type="text" class="form-control" placeholder="" name="total" value="<?=set_value('total',$t->total) ?>" readonly>
                    <?=form_error('total',"<small class='text-danger'>",'</small>') ?>
                </div>
                <div class="form-group mb-3">
                    <label class="text-dark">Status</label>
                    <select class="form-control text-dark" name="status">
                        <option value="1" <?=($t->status=='1')?'selected':'' ?> <?=set_select('status', '1') ?>>Lunas</option>
                        <option value="2" <?=($t->status=='2')?'selected':'' ?> <?=set_select('status', '2') ?>>Belum Lunas</option>
                    </select>
                </div>
                <div class="d-flex">
                <button type="submit" class="btn btn-primary mr-3">Update</button>
              <?php endforeach ?>
            </form>        
            <a href="<?=base_url('admin/transaksi') ?>" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>