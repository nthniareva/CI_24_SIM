<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Peminjaman</h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('peminjaman/update/'.$peminjaman->id_peminjaman) ?>" method="post">
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" class="form-control" value="<?= $peminjaman->judul_buku ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Nama Anggota</label>
                    <input type="text" class="form-control" value="<?= $peminjaman->nama ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <input type="text" class="form-control" value="<?= $peminjaman->tanggal_pinjam ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Tanggal Kembali</label>
                    <input type="text" class="form-control" value="<?= $peminjaman->tanggal_kembali ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Dipinjam" <?= $peminjaman->status == 'Dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                        <option value="Kembali" <?= $peminjaman->status == 'Kembali' ? 'selected' : '' ?>>Kembali</option>
                    </select>
                    <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('peminjaman') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>