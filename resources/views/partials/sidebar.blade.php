<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard*') ? 'active' : '' }}"
                    aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            @can('admin')
                <li><a href="{{ url('/outlet') }}" class="{{ request()->is('outlet*') ? 'active' : '' }}"
                        aria-expanded="false">
                        <i class="fas fa-store"></i>
                        <span class="nav-text">Outlet</span>
                    </a>
                </li>
            @endcan
            @canany(['admin', 'kasir'])
                <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-cart-plus"></i>
                        <span class="nav-text">Transaksi</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ url('/transaksi') }}" class="{{ request()->is('transaksi*') ? 'active' : '' }}"
                                aria-expanded="false">Transaksi Baru</a></li>
                        <li><a href="{{ url('/pesanan') }}" class="{{ request()->is('transaksi*') ? 'active' : '' }}"
                                aria-expanded="false">Kelola
                                Pesanan</a></li>
                    </ul>
                </li>
            @endcanany
            @can('admin')
                <li><a href="{{ url('/paket') }}" class="{{ request()->is('paket*') ? 'active' : '' }}"
                        aria-expanded="false">
                        <i class="fas fa-cubes"></i>
                        <span class="nav-text">Paket Laundry</span>
                    </a>
                </li>
                <li><a href="{{ url('/management/user') }}"
                        class="{{ request()->is('management/user*') ? 'active' : '' }}" aria-expanded="false">
                        <i class="fas fa-user-cog"></i>
                        <span class="nav-text">Management User</span>
                    </a>
                </li>
            @endcan
            @canany(['admin', 'kasir'])
                <li><a href="{{ url('/registrasi/pelanggan') }}"
                        class="{{ request()->is('registrasi/pelanggan*') ? 'active' : '' }}" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="nav-text">Registrasi Pelanggan</span>
                    </a>
                </li>
            @endcanany
            @canany(['admin', 'kasir', 'owner'])
                <li><a href="{{ url('/laporan') }}" class="{{ request()->is('laporan*') ? 'active' : '' }}"
                        aria-expanded="false">
                        <i class="fas fa-info-circle"></i>
                        <span class="nav-text">Laporan</span>
                    </a>
                </li>
            @endcanany
        </ul>
    </div>
</div>
