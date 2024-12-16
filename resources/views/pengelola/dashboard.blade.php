@extends('base')

@section('judul', 'Dashboard | Jenggala Kops')

@section('sidebar')
    @include('pengelola._partials.sidebar')
@endsection

@section('header')
    @include('pengelola._partials.header')
@endsection

@section('content')
    @can('admin', auth()->user())
        <h1>Admin</h1>
    @endcan

    @can('barista', auth()->user())
        @livewire('barista.dashboard')
    @endcan
@endsection

@section('js_after')
    <script src="{{ asset('assets/oneui/js/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/oneui/js/pages/be_pages_ecom_dashboard.min.js') }}"></script>
@endsection