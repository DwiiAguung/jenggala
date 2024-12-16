@extends('base')

@section('judul', 'Pesanan | Jenggala Kops')

@section('sidebar')
    @include('pengelola._partials.sidebar')
@endsection

@section('header')
    @include('pengelola._partials.header')
@endsection

@section('content')
    @can('admin', App\Models\User::class)
        <h1>Admin</h1>
    @endcan

    @can('barista', App\Models\User::class)
        @livewire('barista.pesanan')
    @endcan
@endsection

@section('js_after')
    <script src="{{ asset('assets/oneui/js/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/oneui/js/pages/be_pages_ecom_dashboard.min.js') }}"></script>
    <script>
        window.addEventListener('alert', event => {
            jQuery(function () {
                One.helpers('notify', {
                    type: event.detail.type, 
                    icon: event.detail.icon, 
                    message: event.detail.message
                });
            });
        });
    </script>
@endsection