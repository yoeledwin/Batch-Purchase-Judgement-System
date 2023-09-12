<?php
foreach($data as $d):
?>
<form action="<?= base_url('data/update/' . $d->id) ?>" method="POST">
    <div class=row>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Tgl. Antri : </label>
                <input type="text" name="tgl_antri" class="form-control"value="<?= $d->tgl_antri?>" readonly>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>No. Antri : </label>
                <input type="text" name="no_antri" class="form-control"value="<?= $d->no_antri?>" readonly>
            </div>
        </div>
    </div>

    <div class=row>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>No. Plat : </label>
                <input type="text" name="no_plat" class="form-control"value="<?= $d->no_plat?>" readonly>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Supplier : </label>
                <input type="text" name="supplier" class="form-control" value="<?= $d->supplier?>" readonly>
                <input type="hidden" id="kode_supplier" value="150505">
                <input type="hidden" id="kode_supplier" value="111940">


            </div>
        </div>
    </div>

    <div class=row>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Daerah Asal : </label>
                <input type="text" name="daerah_asal" class="form-control"value="<?= $d->daerah_asal?>" readonly>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Jenis Bokar : </label>
                <br>
                <select name="jenis_bokar" id="jenis_bokar" class="form-control">
                    <option <?php if ($d->jenis_bokar == 'Slab Tebal') { echo 'selected'; }?> >Slab Tebal</option>
                    <option <?php if ($d->jenis_bokar == 'Slab Tipis') { echo 'selected'; }?> >Slab Tipis</option>
                    <option <?php if ($d->jenis_bokar == 'Slab Lump') { echo 'selected'; }?> >Slab Lump</option>
                    <option <?php if ($d->jenis_bokar == 'Lump') { echo 'selected'; }?> >Lump</option>
                    <option <?php if ($d->jenis_bokar == 'Sheet') { echo 'selected'; }?> >Sheet</option>
                    <option <?php if ($d->jenis_bokar == 'RUSS') { echo 'selected'; }?> >RUSS</option>
                </select>
                <?= form_error('jenis_bokar', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>
    </div>
       
    <div class=row>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Kelas : </label>
                <input type="text" name="kelas" value="<?= $d->kelas?>" class="form-control">
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Partai : </label>
                <input type="text" name="partai" value="<?= $d->partai?> "class="form-control">
            </div>
        </div>
    </div>

    <div class=row>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>DRC History (%) : </label>
                <input type="text" name="drc_history" class="form-control" value="Loading" readonly>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>DRC Taksir (%) : </label>
                <input type="text" name="drc_taksir" class="form-control" value="<?= $d->drc_taksir?>">
            </div>
        </div>
    </div>
          
    <div>
        <label>File : </label>
        <input type="file" name="file" class="form-control">
        <br>
    </div>


    <br>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
    
</form>
<?php 
endforeach 
?>

<script>
    $(function () {
        getPrediksi();
    });

    function getPrediksi() {
        let kode_pic = $("#kode_supplier").val();
        let daerah = 'daerahA';
        $.ajax({
            headers: {  'Access-Control-Allow-Origin': 'http://127.0.0.1:5000' },
            url: 'http://127.0.0.1:5000/predict',
            type: 'POST',
            dataType: 'JSON',
            contentType: "application/json",
            data: JSON.stringify({
                kode_pic: kode_pic,
                daerah: daerah,
            }),
            success: (response) => {
                console.log(response);
                $("input[name='drc_history']").val(response);
            }
        });
    }
</script>