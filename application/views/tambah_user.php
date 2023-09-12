<form action="<?= base_url('setting_user/tambah_aksi') ?>" method="POST">
      <div class="form-group">
      <label>NIK:</label>
  <br>
  <select name="nik" id="nik" class="form-control">
    <option value="156200098">156200098</option>
    <option value="146300072">146300072</option>
    </select>
    <br>
    <div class="form-group">
        <label>User:</label>
        <input type="text" name="user" class="form-control" readonly>
        <?= form_error('user', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Pabrik:</label>
        <input type="text" name="pabrik" class="form-control" readonly>
        <?= form_error('pabrik', '<div class="text-small text-danger">', '</div>'); ?>
    </div>

  <br>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
</form>

