<?=$this->session->flashdata('flash') ?>
<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-12">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4 font-weight-bold"><i class="fas fa-fw fa-box-open"></i> Pakai <?=$section ?></h1>
            </div>
            <form class="barang" method="POST" action="<?=base_url('admin/barang/pakaiStok')?>">
            <?php foreach ($tampil as $t): ?>
              <input type="hidden" name="id" value="<?=$t->id?>">
              <div class="form-group mb-3">
                <label class="text-dark">Nama Barang</label>
                <input type="text" class="form-control" placeholder="" name="nama" value="<?=set_value('nama', $t->nama) ?>" readonly>
                <?=form_error('nama',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Stok Barang</label>
                <input type="text" class="form-control" placeholder="" id="stok" name="stok" value="<?=set_value('stok', $t->stok) ?>" readonly>
                <?=form_error('stok',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Jumlah Barang</label>
                <input type="number" class="form-control" placeholder="Masukkan Jumlah Barang Yang Dipakai" id="jumlah" name="jumlah">
                <?=form_error('stok',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Sisa Stok Barang</label>
                <input type="number" class="form-control" placeholder="" id="sisa_stok" name="sisa_stok" readonly>
                <?=form_error('stok',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="d-flex">
                <button type="submit" class="btn btn-primary mr-3">Update</button>
                <a href="<?=base_url('admin/barang') ?>" class="btn btn-secondary btn-md">Kembali</a>      
              </div>
            <?php endforeach ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#jumlah').on("input", function(){
      var jumlah = $('#jumlah').val();
      var stok = $('#stok').val();
      console.log(stok);

      var sisa_stok = stok-jumlah;
      $('#sisa_stok').val(sisa_stok);
    });
  });
</script>