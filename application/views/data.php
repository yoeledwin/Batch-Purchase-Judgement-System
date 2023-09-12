<?= $this->session->flashdata('pesan'); ?>
<div class="card">
    <!-- <div class="card-header">
        <a href="<?= base_url ('data/tambah') ?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
        <br>
        <br>
        <div class="navbar-form navbar-right">
            <br>
            <?php echo form_open('Data/search') ?>
            <input type="text" name="keyword" class="form-control" placeholder="search" autocomplete="off" autofocus>
            <button type="submit" class="btn btn-warning">Cari</button>
            <?php echo form_close() ?>
        </div> 
        <br>
    </div>     -->
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
                    <th>Tgl. Antri</th>
                    <th>No. Antri</th>
                    <th>No. Plat</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <?php $no = 1;
                  foreach($data  as $d ) : ?>
                  <tbody>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $d->tgl_antri ?></td>
                    <td><?= $d->no_antri ?></td>
                    <td><?= $d->no_plat ?></td>
                    <td>
                        <a href="<?= base_url('data/edit/' . $d->id) ?>" class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></a>
                        <!-- <a href="<?= base_url('data/delete/' . $d->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fa fa-times-circle"></i></a> -->
                    </td>
                  </tr>
                </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div> 