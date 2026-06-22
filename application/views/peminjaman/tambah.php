<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Peminjaman</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('peminjaman/simpan') ?>" method="post">
                
                <div class="form-group">
                    <label>Anggota</label>
                    <select name="anggota_id" class="form-control" required>
                        <option value="">Pilih Anggota</option>
                        <?php if(!empty($anggota)): ?>
                            <?php foreach($anggota as $a): ?>
                                <option value="<?= $a->id; ?>">
                                    <?= $a->nama; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Data anggota tidak tersedia</option>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Buku</label>
                    <select name="buku_id" class="form-control" required>
                        <option value="">Pilih Buku</option>
                        <?php if(!empty($buku)): ?>
                            <?php foreach($buku as $b): ?>
                                <option value="<?= $b->id_buku; ?>">
                                    <?= $b->judul_buku; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Data buku tidak tersedia</option>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tanggal Jatuh Tempo</label>
                    <input type="date" name="tanggal_jatuh_tempo" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('peminjaman') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>