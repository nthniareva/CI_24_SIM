<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Peminjaman</h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('peminjaman/simpan') ?>" method="post">
                <div class="form-group">
                    <label>Pilih Buku</label>
                    <select name="id_buku" class="form-control" required>
                        <option value="">-- Pilih Buku --</option>
                        <?php foreach($buku as $b): ?>
                            <option value="<?= $b->id_buku ?>"><?= $b->kode_buku ?> - <?= $b->judul_buku ?> (Stok: <?= $b->stok ?>)</option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_buku', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Pilih Anggota</label>
                    <select name="nomor_anggota" class="form-control" required>
                        <option value="">-- Pilih Anggota --</option>
                        <?php foreach($anggota as $a): ?>
                            <option value="<?= $a->nomor_anggota ?>"><?= $a->nomor_anggota ?> - <?= $a->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('nomor_anggota', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" class="form-control" value="<?= date('Y-m-d') ?>" required>
                    <?= form_error('tanggal_pinjam', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" class="form-control" required>
                    <?= form_error('tanggal_kembali', '<small class="text-danger">', '</small>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('peminjaman') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>