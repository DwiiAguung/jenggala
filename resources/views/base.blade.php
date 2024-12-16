<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>
            @yield('judul')
        </title>

        <meta name="robots" content="noindex, nofollow">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ asset('assets/oneui/media/favicons/favicon.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/oneui/media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/oneui/media/favicons/apple-touch-icon-180x180.png') }}">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/oneui/css/oneui.min.css') }}">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
        <!-- END Stylesheets -->
        @yield('css_after')
        @livewireStyles
    </head>
    <body>
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow"
            @if(
                Route::currentRouteName() == 'guest.main' ||
                Route::currentRouteName() == 'login' ||
                Route::currentRouteName() == 'customer.pesanan'
            )
                style="padding-left: 0"
            @endif
        >
            <!-- Sidebar -->
            @yield('sidebar')
            <!-- END Sidebar -->

            <!-- Header -->
            @yield('header')
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Hero -->
                @yield('hero')
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            @if(!Route::currentRouteName() == 'login')
                <footer id="page-footer" class="bg-body-light">
                    <div class="content py-3">
                        <div class="row font-size-sm">
                            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                                Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                            </div>
                            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                                <a class="font-w600" href="https://1.envato.market/AVD6j" target="_blank">OneUI 4.8</a> &copy; <span data-toggle="year-copy"></span>
                            </div>
                        </div>
                    </div>
                </footer>    
            @endif
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <script src="{{ asset('assets/oneui/js/core/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/oneui/js/oneui.core.min.js') }}"></script>
        <script src="{{ asset('assets/oneui/js/oneui.app.min.js') }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ asset('assets/oneui/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

        @livewireScripts
        @yield('js_after')
    </body>
</html>
