<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            {{-- <img src="images\logo_pertamina.png" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
            <a href="profile" class="d-block">Delinda Candrawati</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ url('dashboard') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                        Dashboard
                        {{-- <span class="right badge badge-danger">New</span> --}}
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
                <a href="{{ url('barang/create') }}" class="nav-link {{ $activeMenu == 'barang_baru' ? 'active' : '' }}">
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
                        Barang Masuk

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
