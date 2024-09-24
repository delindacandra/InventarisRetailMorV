<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info w-100 text-center">
            <a href="profile" class="d-block">{{ session('user.name') }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
            <li class="nav-header">HOME</li>
            <li class="nav-item">
                <a href="{{ url('dashboard') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-header">FLOW BARANG</li>
            <li class="nav-item">
                <a href="{{ url('barang') }}" class="nav-link {{ $activeMenu == 'data_barang' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>
                        Data Barang

                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('barang/create') }}"
                    class="nav-link {{ $activeMenu == 'barang_baru' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                        Barang Baru

                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('barang_masuk') }}"
                    class="nav-link {{ $activeMenu == 'barang_masuk' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-truck-loading"></i>
                    <p>
                        Tambah Stok
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('barang_keluar') }}"
                    class="nav-link {{ $activeMenu == 'barang_keluar' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-truck-moving"></i>
                    <p>
                        Barang Keluar
                    </p>
                </a>
            </li>
            <li class="nav-header">TAMBAHAN</li>
            <li class="nav-item">
                <a href="{{ url('profile') }}" class="nav-link {{ $activeMenu == 'profile' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Profile
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
