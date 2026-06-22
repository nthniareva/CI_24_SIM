<div class="container-fluid">
    
    <h2 class="h3 mb-4 text-gray-800">Data Anggota</h2>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <a href="<?= site_url('anggota/tambah'); ?>" class="btn btn-primary mb-3">Tambah Anggota</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Anggota</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($anggota as $a): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $a->nomor_anggota; ?></td>
                        <td><?= $a->nama; ?></td>
                        <td><?= $a->telepon; ?></td>
                        <td><?= $a->email; ?></td>
                        <td>
                            <?php if($a->status == 'Aktif'): ?>
                                <span class="badge badge-success">Aktif</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Tidak Aktif</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= site_url('anggota/edit/'.$a->nomor_anggota); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= site_url('anggota/hapus/'.$a->nomor_anggota); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau dihapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>