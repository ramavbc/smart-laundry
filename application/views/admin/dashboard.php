<!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-dark shadow h-100 py-2 bg-info">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-md font-weight-bold text-white text-uppercase mb-1">Total User</div>
                      <div class="h2 mb-0 font-weight-bold text-white"><?=$this->model->selectUser('SELECT * FROM user')->num_rows();?></div>
                  </div>
                  <div class="col-auto">
                      <?php if($this->session->userdata('level')=='1'):?>
                      <a href="user">
                      <?php endif;?>
                          <i class="fas fa-fw fa-user fa-3x text-dark"></i>
                      </a>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-dark shadow h-100 py-2 bg-info">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-md font-weight-bold text-white text-uppercase mb-1">Total Customer</div>
                      <div class="h2 mb-0 font-weight-bold text-white"><?=$this->model->selectCustomer('SELECT * FROM customer')->num_rows();?></div>
                  </div>
                  <div class="col-auto">
                      <a href="customer">
                          <i class="fas fa-fw fa-users fa-3x text-dark"></i>
                      </a>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-dark shadow h-100 py-2 bg-info">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-md font-weight-bold text-white text-uppercase mb-1">Total Transaksi</div>
                      <div class="h2 mb-0 font-weight-bold text-white"><?=$this->model->selectTransaksi('SELECT * FROM transaksi')->num_rows();?></div>
                  </div>
                  <div class="col-auto">
                      <a href="transaksi">
                        <i class="fas fa-fw fa-coins fa-3x text-dark"></i>
                      </a>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-dark shadow h-100 py-2 bg-info">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-md font-weight-bold text-white text-uppercase mb-1">Total Barang</div>
                      <div class="h2 mb-0 font-weight-bold text-white"><?=$this->model->selectBarang('SELECT * FROM barang')->num_rows();?></div>
                  </div>
                    <div class="col-auto">
                      <?php if($this->session->userdata('level')=='1'):?>
                      <a href="barang">
                      <?php endif;?>
                        <i class="fas fa-fw fa-box-open fa-3x text-dark"></i>
                      </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div> <!-- END ROW-->

  <hr>

  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-2">
        <div class="card-header py-3 d-flex">
          <div>
            <span class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-users"></i> Data Customer</span>
          </div>
          <div class="ml-auto">
            <a href="<?=base_url('admin/customer')?>"><i class="fas fa-fw fa-eye text-primary"></i><b> View</b></a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="table-datatable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Alamat</th> 
                  <th>Telp</th>
                </tr>
              </thead>
              <tbody>
                <?php $a = 1; foreach ($customer as $cs) { ?>
                <tr>
                  <th scope="row"><?= $a++; ?></th>
                  <td><?=$cs->nama?></td>
                  <td><?=$cs->alamat?></td>
                  <td><?=$cs->telp?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card shadow mb-2">
        <div class="card-header py-3 d-flex">
          <div>
            <span class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-coins"></i> Data Transaksi</span>
          </div>
          <div class="ml-auto">
            <a href="<?=base_url('admin/transaksi')?>"><i class="fas fa-fw fa-eye text-primary"></i><b> View</b></a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="table-datatable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Customer</th>
                  <th>Jenis</th> 
                  <th>Berat</th>
                  <th>Tanggal Transaksi</th>
                  <th>Tanggal Ambil</th>
                  <th>Total Harga</th>
                  <th>Status Pembayaran</th>
                </tr>
              </thead>
              <tbody>
                <?php $a = 1; foreach ($transaksi as $tr) { ?>
                <tr>
                  <th scope="row"><?= $a++; ?></th>
                  <td><?=$tr->customer?></td>
                  <td><?=$tr->jenis?></td>
                  <td><?=$tr->berat?> Kg</td>
                  <td><?=$tr->tgl_transaksi?></td>
                  <td><?=$tr->tgl_ambil?></td>
                  <td>Rp.<?= number_format($tr->total, 0, ',', '.') ?></td>
                  <td><?php if($tr->status!='1'){echo 'Belum Lunas';}else{echo 'Lunas';} ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<script src="<?=base_url('assets/')?>js/demo/datatables-demo.js"></script>
<script src="<?=base_url('assets/')?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/')?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>