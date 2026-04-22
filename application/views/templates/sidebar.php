<!-- sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center"
 href="<?= site_url('dashboard') ?>">
    <div class="sidebar-brand-icon rotate-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text rotate-n-15 mx-3">CI3<sup>SB</sup></div>
</a>

<hr class="sidebar-divider my-0">

<!-- Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?= site_url('dashboard') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<hr class="sidebar-divider">

<!-- Menu Barang -->
<li class="nav-item">
    <a class="nav-link" href="<?= site_url('kategori') ?>">
        <i class="fas fa-box"></i>
        <span>Kategori</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= site_url('anggota') ?>">
        <i class="fas fa-box"></i>
        <span>Anggota</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= site_url('buku') ?>">
        <i class="fas fa-box"></i>
        <span>Buku</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= site_url('peminjaman') ?>">
        <i class="fas fa-box"></i>
        <span>Peminjaman</span>
    </a>
</li>

<hr class="sidebar-divider d-none d-md-block">
</ul>

<!-- End of Sidebar -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
