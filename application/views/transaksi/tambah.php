<?=$this->session->flashdata('flash') ?>
<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-12">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4 font-weight-bold"><i class="fas fa-fw fa-coins"></i> Tambah <?=$section ?></h1>
            </div>
            <form class="transaksi" method="POST" action="<?=base_url('admin/transaksi/save')?>">
              <div class="form-group mb-3">
                <label class="text-dark">Customer</label>
                <select class="form-control text-dark" name="customer">
                    <option  value="">Pilih Customer</option>   
                    <?php foreach($customers as $cs):?>
                        <option value="<?php echo $cs->nama; ?>"><?php echo $cs->nama; ?></option>
                    <?php endforeach;?>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Jenis</label>
                <select class="form-control text-dark" id ="jenis" name="jenis">
                    <option  value="">Pilih Jenis</option>   
                    <?php foreach($jeniss as $jn):?>
                      <option value="<?=$jn->jenis.' ('.$jn->harga?>">
                        <?=$jn->jenis.' ('.$jn->harga.')' ?>
                    <?php endforeach;?>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Berat</label>
                <input type="number" class="form-control" placeholder="Masukkan Berat" id ="berat" name="berat" value="<?=set_value('berat') ?>">
                <?=form_error('berat',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Tanggal Ambil</label>
                <input type="date" class="form-control" placeholder="" name="tgl_ambil" value="<?=set_value('tgl_ambil') ?>">
                <?=form_error('tgl_ambil',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Total Harga</label>
                <input type="text" class="form-control" placeholder="" id ="total" name="total" value="<?=set_value('total') ?>" readonly>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Status</label>
                <select class="form-control text-dark" name="status">
                    <option value="">Pilih Status</option>
                    <option value="1" <?=set_select('status','1') ?> >Lunas</option>
                    <option value="2" <?=set_select('status','2') ?> >Belum Lunas</option>
                </select>
              </div>
              <div class="d-flex">
                <button type="submit" class="btn btn-primary mr-3">Tambah</button>
                <a href="<?=base_url('admin/transaksi') ?>" class="btn btn-secondary btn-md">Kembali</a>      
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#jenis').change(function(){
      var berat = $('#berat').val();
      var jenis = $(this).val();
      var jenis = jenis.split('(');
      var jenis = jenis[1];
      
      console.log(jenis);

      var total = berat*jenis;
      $('#total').val(total);
    });

    $('#berat').on("input", function(){
      var berat = $('#berat').val();
      var jenis = $('#jenis').val();
      var jenis = jenis.split('(');
      var jenis = jenis[1];

      console.log(jenis);

      var total = berat*jenis;
      $('#total').val(total);
    });
  });
</script>