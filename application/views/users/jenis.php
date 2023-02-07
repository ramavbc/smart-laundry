<!-- Contact -->
<div class="mb-5">
    <div class="container ">
      <div class="row py-5">
        <div class="col text-center ">
          <h2 class="font-weight-bold text-dark">Daftar Jenis Laundry</h2> 
          <hr width="400px">
        </div>
      </div>
      <div class="row justify-content-center ">
        <div class="col-lg-12">
        	 <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr style="background-color: #3fa1c6; color:#eaeaea">
                  <th width="20px">No</th>
                  <th>Judul Buku</th>
                  <th>Jaminan</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($data as $d): ?>
                <tr>
                  <td align="center"><?=$i ?></td>
                  <td><?=$d->jenis ?></td>
                  <td>Rp.<?= number_format($d->harga, 0, ',', '.') ?></td>
                </tr>
                <?php $i++ ; endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- End Contact -->