<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Peminjaman</h1>
    <a href="<?= base_url('peminjaman/tambah') ?>" class="btn btn-primary mb-3">Tambah Peminjaman</a>
    
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Nama Anggota</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($peminjaman as $p): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $p->judul_buku ?></td>
                            <td><?= $p->nama ?></td>
                            <td><?= $p->tanggal_pinjam ?></td>
                            <td><?= $p->tanggal_kembali ?></td>
                            <td>
                                <?php if($p->status == 'Dipinjam'): ?>
                                    <span class="badge badge-warning">Dipinjam</span>
                                <?php else: ?>
                                    <span class="badge badge-success">Kembali</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($p->status == 'Dipinjam'): ?>
                                    <a href="<?= base_url('peminjaman/kembalikan/'.$p->id_peminjaman) ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin mengembalikan?')">Kembalikan</a>
                                <?php endif; ?>
                                <a href="<?= base_url('peminjaman/edit/'.$p->id_peminjaman) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('peminjaman/hapus/'.$p->id_peminjaman) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>