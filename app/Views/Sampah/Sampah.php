<?= $this->extend('default');

$this->section('content'); ?>
<header class="my-2">
    <h2 class="display-3 text-center">Daftar Sampah</h2>
    <p class="lead text-center">List daftar sampah tiap wilayah</p>
    <a href="<?= base_url('/sampah/create'); ?>" type="button" class="btn btn-pink">Tambah</a>
</header>
<?php if (!empty(session()->getFlashdata('message'))) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<table class="table table-bordered">
    <tr class="bg-info text-white">
        <th>No</th>
        <th>Wilayah</th>
        <th>Jenis Sampah</th>
        <th>Berat Sampah (/kg)</th>
        <th>Tinggi Sampah (/kg)</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    foreach ($sampah as $sampah) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $sampah['nama_wilayah'] ?></td>
            <td><?= $sampah['jenis_sampah'] ?></td>
            <td><?= $sampah['berat'] ?></td>
            <td><?= $sampah['tinggi'] ?></td>
            <td>
                <a href="<?= base_url('/sampah/edit/' . $sampah['id_wilayah']) ?>" class="btn btn-pink">Edit</a>
                <a href="<?= base_url('/sampah/delete/' . $sampah['id_wilayah']) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<?= $this->endSection(); ?>