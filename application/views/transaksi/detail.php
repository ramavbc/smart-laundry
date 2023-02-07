<div class="container-fluid">
  <!-- Page Heading -->
    <?=$this->session->flashdata('flash') ?>
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
                <div>
                    <span class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-coins"></i> Detail <?=$section ?></span>
                </div>
                <div class="ml-auto">
                    <a class="btn btn-sm btn-dark text-light" href="<?=base_url('admin/transaksi/')?>"><i class="fas fa-fw fa-arrow-circle-left"></i><b> Kembali</b></a> 
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php 
                    foreach($tampil as $t){ 
                    $id = str_replace(['=','+','/'],['-','_','~',], $this->encryption->encrypt($t->id));
                    ?>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>ID Transaksi</strong></td>
                                <td>:</td>
                                <td><?= $t->id ?></td>
                            </tr>
                            <tr>
                                <td><strong>Nama Customer</strong></td>
                                <td>:</td>
                                <td><?= $t->customer ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Transaksi</strong></td>
                                <td>:</td>
                                <td><?= $t->tgl_transaksi ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Ambil</strong></td>
                                <td>:</td>
                                <td><?= $t->tgl_ambil ?></td>
                            </tr>
                        </table>
                    </div>
                    <?php } ?>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td><strong>No</strong></td>
                                    <td><strong>Jenis</strong></td>
                                    <td><strong>Berat</strong></td>
                                    <td><strong>Status</strong></td>
                                    <td><strong>Sub Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $a = 1;
                                foreach($tampil as $t){ 
                                $id = str_replace(['=','+','/'],['-','_','~',], $this->encryption->encrypt($t->id));
                                ?>
                                <tr>
                                    <th scope="row"><?= $a++; ?></th>
                                    <td><?=$t->jenis?></td>
                                    <td><?=$t->berat?> Kg</td>
                                    <td><?php if($t->status!='1'){echo 'Belum Lunas';}else{echo 'Lunas';} ?></td>
                                    <td>Rp.<?= number_format($t->total, 0, ',', '.') ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" align="right"><strong>Total Harga : </strong></td>
                                    <td>Rp.<?= number_format($t->total, 0, ',', '.') ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
