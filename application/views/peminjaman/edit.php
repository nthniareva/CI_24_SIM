<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Peminjaman</h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('peminjaman/update/'.$peminjaman->id) ?>" method="post">
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
                    <label>Tanggal Jatuh Tempo</label>
                    <input type="date" name="tanggal_jatuh_tempo" class="form-control" value="<?= $peminjaman->tanggal_jatuh_tempo ?>" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="dipinjam" <?= $peminjaman->status == 'dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                        <option value="kembali" <?= $peminjaman->status == 'kembali' ? 'selected' : '' ?>>Kembali</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('peminjaman') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>