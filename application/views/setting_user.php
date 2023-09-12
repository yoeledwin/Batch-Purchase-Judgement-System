<?= $this->session->flashdata('pesan'); ?>
<div class="card">
              <div class="card-header">
              <a href="<?= base_url ('setting_user/tambah') ?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah User</a>     
     <br>
     <br>
     </thead>
     <div class="navbar-form navbar-right">
                <br>
         <?php echo form_open('setting_user/search') ?>
        <input type="text" name="keyword" class="form-control" placeholder="search" autocomplete="off" autofocus>
        <button type="submit" class="btn btn-warning">Cari</button>
         <?php echo form_close() ?>
         </div> 
            <br>
         </div>   
              </div>
              </form>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>NIK</th>
                    <th>User</th>
                    <th>Pabrik</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <?php $no = 1;
                  foreach($setting_user as $su) : ?>
                  <tbody>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $su->nik ?></td>
                    <td><?= $su->nama ?></td>
                    <td><?= $su->pabrik ?></td>
                    <td>
                        <button data-toggle="modal" data-target="#edit<?= $su->id ?>" class="btn btn-primary btn-sm"><i class="fas fa-user-edit"></i></button>
                        <a href="<?= base_url('setting_user/delete/' . $su->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus user ini?')"><i class="fa fa-times-circle"></i></a>
                  </td>
                  </tr>
                </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>
  

<!-- Modal Edit-->
<?php foreach($setting_user as $su) { ?>
<div class="modal fade" id="edit<?= $su->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('setting_user/edit/' . $su->id) ?>" method="POST">
      <div class="form-group">
  <label>NIK:</label>
  <br>
  <select name="nik" id="nik" class="form-control">
  <option value="156200098" <?php if($su->nik == "156200098") { echo "SELECTED"; } ?>>156200098</option>
  <option value="146300072" <?php if($su->nik == "146300072") { echo "SELECTED"; } ?>>146300072</option>    
</select> 
</div>
<div class="form-group">
        <label>User:</label>
        <input type="text" name="user" class="form-control" value="<?= $su->user ?>" readonly>
        <?= form_error('user', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Pabrik:</label>
        <input type="text" name="pabrik" class="form-control" value="<?= $su->pabrik ?>" readonly>
        <?= form_error('pabrik', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
</div>
</form>
      </div>
      </div>
    </div>
  </div>
  <?php } ?>