<div class="container-fluid">
    
    <h2 class="h3 mb-4 text-gray-800">Data Peminjaman</h2>

    <a href="<?= site_url('peminjaman/tambah'); ?>" class="btn btn-primary mb-3">Tambah</a>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($data as $d): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->kode_peminjaman; ?></td>
                        <td><?= $d->nama; ?></td>
                        <td><?= $d->tanggal_pinjam; ?></td>
                        <td>
                            <?php if($d->status == 'dipinjam'): ?>
                                <span class="badge badge-warning">Dipinjam</span>
                            <?php else: ?>
                                <span class="badge badge-success">Kembali</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= site_url('peminjaman/edit/'.$d->id); ?>" class="btn btn-info btn-sm">Edit</a>
                            <?php if($d->status == 'dipinjam'): ?>
                                <a href="<?= site_url('peminjaman/kembali/'.$d->id); ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin mengembalikan?')">Kembalikan</a>
                            <?php endif; ?>
                            <a href="<?= site_url('peminjaman/hapus/'.$d->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>