<div class="container-fluid">
  <!-- Page Heading -->
<?=$this->session->flashdata('flash') ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
      <div>
        <span class="m-0 font-weight-bold text-primary"><i class="fa fa-fw fa-user"></i> Data <?=$section ?></span>
      </div>
      <div class="ml-auto">
        <a class="btn btn-sm btn-primary text-light" href="<?=base_url('admin/user/add')?>"><i class="fa fa-fw fa-user-plus"></i><b> Tambah User</b></a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Level</th>
              <th>Alamat</th>
              <th>Telp</th>
              <th width="150">Aksi</th>
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
              <td><?=$t->nama ?></td>
              <td><?=$t->username ?></td>
              <td><?php if($t->level!='1'){echo 'Karyawan';}else{echo 'Admin';} ?></td>
              <td><?=$t->alamat ?></td>
              <td><?=$t->telp ?></td>
              <td>
                <center>
                <a href="<?=base_url('admin/user/edit/'.$id) ?>" type='button' title='Edit' class='btn btn-primary btn-md'><span class='fas fa-fw fa-edit'></span></a>
                <a href="" onclick="deleteConfirm('<?=base_url('admin/user/delete/'.$id)?>')" title='Hapus' class='btn btn-danger btn-md' data-target="#deleteModal" data-toggle="modal"><span class='fas fa-fw fa-trash'></span></a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-sm btn-danger btn-ok" id="btn-delete">Hapus</a>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    function deleteConfirm(url){
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    };  
</script>