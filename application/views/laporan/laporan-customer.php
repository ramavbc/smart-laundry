<div class="container-fluid">
  <!-- Page Heading -->
<?=$this->session->flashdata('flash') ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
      <div>
        <span class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-users"></i> <?=$section ?> Customer</span>
      </div>
      <div class="ml-auto">
        <a class="btn btn-sm btn-info text-light" href="<?=base_url('admin/laporan/laporan_print_customer/')?>"><i class="fas fa-fw fa-print" aria-hidden="true"></i><b> Print</b></a>
        <a class="btn btn-sm btn-danger text-light" href="<?=base_url('admin/laporan/laporan_pdf_customer/')?>"><i class="fas fa-fw fa-file-pdf" aria-hidden="true"></i><b> Export PDF</b></a> 
        <a class="btn btn-sm btn-success text-light" href="<?=base_url('admin/laporan/laporan_excel_customer/')?>"><i class="fas fa-fw fa-file-excel" aria-hidden="true"></i><b> Export Excel</b></a> 
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Telp</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $a = 1;
              foreach($tampil as $t){ 
            ?>
            <tr>
              <th scope="row"><?= $a++; ?></th>
              <td><?=$t->nama ?></td>
              <td><?=$t->alamat ?></td>
              <td><?=$t->telp ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>