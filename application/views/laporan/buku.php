<div class="container-fluid">
<h3> Laporan Buku</h3>

<form method="get">
    <input type="text" name="judul" placeholder="Cari Judul Buku" value="<?= $judul; ?>">
    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
    <a href="<?= site_url('laporan/buku'); ?>" class="btn btn-secondary btn-sm">Reset</a>
</form>

<br>
<a href="<?= site_url('peminjaman/cetak_buku?judul='. $judul); ?>" target="_blank" class="btn btn-success btn-sm">Cetak PDF</a>

<table class="table table-bordered mt-3">
    <tr>
        <th>No</th>
        <th>Kode Buku</th>
        <th>Judul Buku</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Stok</th>
        <th>Lokasi Rak</th>
    </tr>
    <?php $no=1; foreach($data as $d): ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d->kode_buku; ?></td>
            <td><?= $d->judul_buku; ?></td>
            <td><?= $d->penulis; ?></td>
            <td><?= $d->penerbit; ?></td>
            <td><?= $d->tahun; ?></td>
            <td><?= $d->stok; ?></td>
            <td><?= $d->lokasi_rak; ?></td>
        </tr>
        <?php endforeach; ?>
</table>
</div>