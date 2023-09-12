<form action="<?= base_url('data/tambah_aksi') ?>" method="POST">
<?php
echo "<h1>".$title."</h1>";
// echo ("<h1>" +$title+"</h1>")
?>
    <div class="form-group">
        <label>Date:</label>
        <input type="datetime-local" name="tanggal_waktu"class="form-control datetimepicker-input" data-target="#reservationdate"/>
    </div>

    <div class=row>
        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Pabrik:</label>
                <br>
                <select name="kode_pabrik" id="kode_pabrik" onchange="namaPabrik(this.value)" class="form-control">
                <?php
                foreach($pabrik as $p):?>
                    <option value="<?php echo($p->kode)?>"> <?php echo($p->kode)?> </option>
                <?php endforeach ?>
                </select>
                <?= form_error('kode_pabrik', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Nama Pabrik:</label>
                <br>
                <input type="text" id="nama_pabrik" class="form-control" readonly>
                
            </div>
        </div>

    </div>

    <div class=row>

        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Kode Supplier:</label>
                <input type="text" name="kode_supplier" id="kode_supplier" class="form-control" readonly>
                <br>
            </div>
        </div>
                
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Nama Supplier:</label>
                <br>
                <select name="nama_supplier" id="nama_supplier" onchange="kodeSupplier(this.value)" class="form-control">
                <?php
                    foreach($supplier as $s):?>
                    <option value="<?php echo($s->nama)?>"><?php echo($s->nama)?></option>
                <?php endforeach ?>
                </select>
            </div>
        </div>
    </div>

    <div class=row>
        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Daerah Asal:</label>
                <br>
                <select name="daerah_asal" id="daerah_asal" class="form-control">
                    <?php
                        foreach($daerah_asal as $da):?>
                        <option value="<?php echo($da->nama)?>"><?php echo($da->nama)?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('daerah_asal', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Jenis Bokar:</label>
                <br>
                <select name="jenis_bokar" id="jenis_bokar" class="form-control">
                <?php
                foreach($jenis_bokar as $jb):?>
                    <option value="<?php echo($jb->nama)?>"><?php echo($jb->nama)?></option>
                <?php endforeach ?>
                </select>
                <?= form_error('jenis_bokar', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>
    </div>

    <div class=row>
        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>DRC Patokan (history):</label>
                <input type="text" name="drc_patokan" class="form-control" readonly>
                <?= form_error('drc_taksir', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>
            
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>DRC Taksir:</label>
                <input type="text" name="drc_takir" class="form-control" readonly>
                <?= form_error('drc_taksir', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>

    </div>

    <div class=row>
        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>DRC Beli Nego:</label>
                <input type="text" name="drc_beli_nego" class="form-control" readonly>
                <?= form_error('drc_beli_nego', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>DRC Lab:</label>
                <input type="text" name="drc_lab" class="form-control" readonly>
                <?= form_error('drc_lab', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>
    </div>

    <div class=row>
        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Adjustment DRC Lab:</label>
                <input type="text" name="adjustment_drc_lab" class="form-control" readonly>
                <?= form_error('adjustment_drc_lab', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>
    
        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Mobile Notarin:</label>
                <input type="text" name="mobile_notarin" class="form-control" readonly>
                <?= form_error('mobile_notarin', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>
    </div>

    <div class=row>
        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Hasil Kering Nego:</label>
                <input type="text" name="hasil_kering_nego" class="form-control" readonly>
                <?= form_error('hasil_kering_nego', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>

        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Timbang Basah:</label>
                <input type="text" name="timbang_basah" class="form-control" readonly>
                <?= form_error('timbang_basah', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>
    </div>

    <div class=row> 
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Notarin Awal:</label>
                <input type="number" id="notarin_awal" name="notarin_awal" onchange="hitung_notarin()"class="form-control">
                <?= form_error('notarin_awal', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>

        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Hasil Kering Patokan/Lab:</label>
                <input type="text" name="hasil_kering_patokan_lab" class="form-control" readonly>
                <?= form_error('hasil_kering_patokan_lab', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>
    </div>

    <div class=row>
        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Total Harga Beli Awal:</label>
                <input type="text" name="total_harga_beli_awal" class="form-control" readonly>
                <?= form_error('total_harga_beli_awal', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>

        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Total Harga Beli Patokan:</label>
                <input type="text" name="total_harga_beli_patokan" class="form-control" readonly>
                <?= form_error('total_harga_beli_patokan', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>
    </div>

    <div class=row>
        
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Notarin (BPJS):</label>
                <input type="number" id ="notarin_bpjs" name="notarin_bpjs" class="form-control" readonly>
                <?= form_error('notarin_bpjs', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label>Selisih Notarin:</label>
                <input type="text" id="selisih_notarin" name="selisih_notarin" class="form-control" readonly>
                <?= form_error('selisih_notarin', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
        </div>
    </div>

    <br>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
</form>

<script type="text/javascript">

    var pabrik = <?php echo json_encode($pabrik); ?>;
    function namaPabrik(){
        var kode_p = document.getElementById('kode_pabrik').value;
        let pabrikIndex = pabrik.findIndex(obj => obj.kode === kode_p);
        document.getElementById('nama_pabrik').value=pabrik[pabrikIndex].nama;
    }

    var supplier = <?php echo json_encode($supplier); ?>;
    function kodeSupplier(){
            var nama_s = document.getElementById('nama_supplier').value;
            let supplierIndex = supplier.findIndex(obj => obj.nama === nama_s);
            console.log(supplierIndex);
            document.getElementById('kode_supplier').value=supplier[supplierIndex].kode;
    }

    function hitung_notarin(){
        var notarin_awal=parseFloat(document.getElementById('notarin_awal').value);
        var notarin_bpjs= notarin_awal + (notarin_awal * 0.1);
        var notarin_selisih= notarin_bpjs - notarin_awal;
        document.getElementById('notarin_bpjs').value=notarin_bpjs;
        document.getElementById('selisih_notarin').value=notarin_selisih;
    }
</script>