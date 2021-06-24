<?= $this->extend('default');

$this->section('content'); ?>

<h3 class="display-4 text-center my-3">Edit Data Sampah </h3>
<?php if (!empty(session()->getFlashdata('error'))) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4>Periksa Entrian Form</h4>
        </hr />
        <?php echo session()->getFlashdata('error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<form method="post" action="<?= base_url('sampah/update/'.$sampah['id_wilayah']) ?>">
    <?= csrf_field(); ?>

    <div class="form-group row">
        <label for="nama_wilayah" class="col-2 col-form-label">Nama Wilayah</label>
        <div class="col">
            <input type="text" class="form-control" id="nama_wilayah" name="nama_wilayah" value="<?php echo $sampah['nama_wilayah'] ?>"/>
        </div>
    </div>

    <div class="form-group row">
        <label for="jenis_sampah" class="col-2 col-form-label">Jenis Sampah</label>
        <div class="col">
            <input type="text" class="form-control" id="jenis_sampah" name="jenis_sampah" value="<?php echo $sampah['jenis_sampah'] ?>"/>
        </div>
    </div>

    <div class="form-group row">
        <label for="berat" class="col-2 col-form-label">Berat (/Kg)</label>
        <div class="col">
            <input type="number" step="0.1" class="form-control" id="berat" name="berat" value="<?php echo $sampah['berat'] ?>"/>
        </div>
    </div>

    <div class="form-group row">
        <label for="tinggi" class="col-2 col-form-label">Tinggi (/Kg)</label>
        <div class="col">
            <input type="number" step="0.1" class="form-control" id="tinggi" name="tinggi" value="<?php echo $sampah['tinggi'] ?>"/>
        </div>
    </div>

    <div class="form-group row">
        <div class="col">
            <input type="submit" value="Simpan" class="btn btn-info col-form-label" />
        </div>
    </div>

</form>
<?= $this->endSection(); ?>