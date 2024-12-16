<header id="page-header" style="padding-left: 0">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            {{-- <button type="button" class="btn btn-sm btn-dual mr-2" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button> --}}
            <a href="{{ route('guest.main') }}">
                <img src="{{ asset('assets/img/jenggala_v1.jpg') }}" alt="Jenggala"
                    style="width: 55px"
                >
            </a>
            <!-- END Toggle Sidebar -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center">
            <!-- User Dropdown -->
            @auth
                <div class="dropdown d-inline-block ml-2">
                    <button type="button" class="btn btn-sm btn-dual d-flex align-items-center" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle" 
                            alt="Header Avatar" 
                            style="width: 21px;"
                            @if(auth()->user()->role == 'Konsumen')
                                src="{{ auth()->user()->avatar }}"
                            @else
                                src="{{ asset('assets/oneui/media/avatars/avatar10.jpg') }}"
                            @endif
                        >
                        <span class="d-none d-sm-inline-block ml-2">
                            {{ auth()->user()->nama }}
                        </span>
                        <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ml-1 mt-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 border-0" aria-labelledby="page-header-user-dropdown">
                        <div class="p-3 text-center bg-primary-dark rounded-top">
                            <img class="img-avatar img-avatar48 img-avatar-thumb" alt=""
                            @if(auth()->user()->role == 'Konsumen')
                                src="{{ auth()->user()->avatar }}"
                            @else
                                src="{{ asset('assets/oneui/media/avatars/avatar10.jpg') }}"
                            @endif
                        >
                            <p class="mt-2 mb-0 text-white font-w500">
                                {{ auth()->user()->nama }}
                            </p>
                            <p class="mb-0 text-white-50 font-size-sm">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                        <div class="p-2">
                            @if(auth()->user()->role == 'Konsumen')
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('customer.pesanan') }}">
                                    <span class="font-size-sm font-w500">Transaksi</span>
                                    <span class="badge badge-pill badge-primary ml-2">
                                        {{ count(auth()->user()->pesanan) }}
                                    </span>
                                </a>
                            @else
                                <a class="dropdown-item d-flex align-items-center justify-content-between" 
                                    href="{{ route('pengelola.dashboard') }}">
                                    <span class="font-size-sm font-w500">
                                        Dashboard
                                    </span>
                                </a>
                            @endif
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('form-logout').submit();"
                            >
                                <span class="font-size-sm font-w500">Log Out</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}" id="form-logout">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
            @guest
                <a href="{{ route('login-google') }}"
                    class="btn btn-outline-secondary mr-1">
                    <i class="fa fa-sign-in-alt text-default mr-1"></i>Sign in
                </a>
            @endguest
            <!-- END User Dropdown -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->
</header>