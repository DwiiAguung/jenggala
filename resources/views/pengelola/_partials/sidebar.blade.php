<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="{{ route('guest.main') }}">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide font-size-h5 tracking-wider">
                Jenggala<span class="font-w400">Kops</span>
            </span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>
            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ $active === 'dashboard' ? 'active' : '' }}" 
                        href="{{ route('pengelola.dashboard') }}"
                    >
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ $active === 'orders' ? 'active' : '' }}" 
                        href="{{ route('pengelola.pesanan') }}">
                        <i class="nav-main-link-icon far fa-list-alt"></i>
                        <span class="nav-main-link-name">Pesanan</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ $active === 'transaksi' ? 'active' : '' }}" 
                        href="#">
                        <i class="nav-main-link-icon far fa-list-alt"></i>
                        <span class="nav-main-link-name">Transaksi</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ $active === 'products' ? 'active' : '' }}" 
                        href="{{ route('pengelola.katalog.index') }}"
                    >
                        <i class="nav-main-link-icon fa fa-shopping-bag"></i>
                        <span class="nav-main-link-name">Produk</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ $active === 'voucher' ? 'active' : '' }}" 
                        href="#">
                        <i class="nav-main-link-icon fa fa-shopping-bag"></i>
                        <span class="nav-main-link-name">Voucher</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ $active === 'laporan' ? 'active' : '' }}" 
                        href="#">
                        <i class="nav-main-link-icon fa fa-shopping-bag"></i>
                        <span class="nav-main-link-name">Laporan Keuangan</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>