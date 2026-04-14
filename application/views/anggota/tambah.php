<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Anggota</h1>

    <div class="card shadow">
        <div class="card-body">
            
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
            <?php endif; ?>

            <form method="post" action="<?= site_url('anggota/simpan'); ?>">
                <div class="form-group">
                    <label>Nomor Anggota</label>
                    <input type="text" name="nomor_anggota" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Anggota</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Daftar</label>
                    <input type="date" name="tgl_daftar" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('anggota');?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>