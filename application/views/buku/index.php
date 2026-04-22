<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Buku</h1>
    <a href="<?= base_url('buku/tambah') ?>" class="btn btn-primary mb-3">Tambah Buku</a>
    
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
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($buku as $b): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $b->kode_buku ?></td>
                            <td><?= $b->judul_buku ?></td>
                            <td><?= $b->penulis ?></td>
                            <td><?= $b->kategori ?></td>
                            <td><?= $b->stok ?></td>
                            <td>
                                <a href="<?= base_url('buku/edit/'.$b->id_buku) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('buku/hapus/'.$b->id_buku) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>