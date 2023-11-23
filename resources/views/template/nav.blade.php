<hr class="sidebar-divider my-0">
<hr class="sidebar-divider">
<div class="sidebar-heading">Data</div>



<li class="nav-item @if ($title === 'Supplier') active @else '' @endif">
    <a href="/supplier" class="nav-link"><i class="fas fa-fw fa-truck"></i><span> Supplier</span></a>
</li>

<li class="nav-item @if ($title === 'Barang') active @else '' @endif">
    <a href="/barang" class="nav-link"><i class="fas fa-fw fa-archive"></i><span> Barang</span></a>
</li>



<hr class="sidebar-divider d-none d-md-block">
<div class="sidebar-heading">Transaksi</div>

<li class="nav-item @if ($title === 'Peminjaman') active @else '' @endif">
    <a href="/pinjam" class="nav-link"><i class="fas fa-fw fa-address-book"></i><span> Peminjaman Barang</span></a>
</li>

<li class="nav-item @if ($title === '') active @else '' @endif">
    <a href="/barangmasuk" class="nav-link"><i class="fas fa-fw fa-book"></i><span> Barang Masuk</span></a>
</li>

<hr class="sidebar-divider d-none d-md-block">

<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>