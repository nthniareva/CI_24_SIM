<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Buku</h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('buku/update/'.$buku->id_buku) ?>" method="post">
                <div class="form-group">
                    <label>Kode Buku</label>
                    <input type="text" class="form-control" value="<?= $buku->kode_buku ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control" value="<?= $buku->judul_buku ?>" required>
                    <?= form_error('judul_buku', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" value="<?= $buku->penulis ?>" required>
                    <?= form_error('penulis', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" value="<?= $buku->penerbit ?>" required>
                    <?= form_error('penerbit', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Tahun</label>
                    <input type="number" name="tahun" class="form-control" value="<?= $buku->tahun ?>" min="1900" max="2026" required>
                    <?= form_error('tahun', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach($kategori as $k): ?>
                            <option value="<?= $k->nama_kategori ?>" <?= ($k->nama_kategori == $buku->kategori) ? 'selected' : '' ?>>
                                <?= $k->nama_kategori ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('kategori', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= $buku->stok ?>" required>
                    <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Lokasi Rak</label>
                    <input type="text" name="lokasi_rak" class="form-control" value="<?= $buku->lokasi_rak ?>" required>
                    <?= form_error('lokasi_rak', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="Tersedia" <?= $buku->status == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                        <option value="Dipinjam" <?= $buku->status == 'Dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                        <option value="Hilang" <?= $buku->status == 'Hilang' ? 'selected' : '' ?>>Hilang</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('buku') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>