@extends('base')

@section('judul', 'Katalog | Jenggala Kops')

@section('sidebar')
    @include('pengelola._partials.sidebar')
@endsection

@section('header')
    @include('pengelola._partials.header')
@endsection

@section('content')
     <!-- Quick Overview -->
    <div class="row">
        <div class="col-6 col-lg-4">
            <a class="block block-rounded block-link-shadow text-center" 
            href="{{ route('pengelola.katalog.create') }}">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 text-success">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="font-w600 font-size-sm text-success mb-0">
                        Tambah Produk Baru
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-4">
            <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 text-danger">{{ $stokHabis }}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="font-w600 font-size-sm text-danger mb-0">
                        Habis
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-4">
            <a class="block block-rounded block-link-shadow text-center" href="#">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 text-dark">{{ count($katalog) }}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="font-w600 font-size-sm text-muted mb-0">
                        Semua Produk
                    </p>
                </div>
            </a>
        </div>
    </div>
    <!-- END Quick Overview -->

    <!-- All Products -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Semua Produk</h3>
            <div class="block-options">
                <div class="dropdown">
                    <button type="button" class="btn-block-option" id="dropdown-ecom-filters" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filters <i class="fa fa-angle-down ml-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-ecom-filters">
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            New
                            <span class="badge badge-success badge-pill">260</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            Out of Stock
                            <span class="badge badge-danger badge-pill">24</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            All
                            <span class="badge badge-primary badge-pill">14503</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-content">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Search Form -->
            <form action="be_pages_ecom_products.html" method="POST" onsubmit="return false;">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-alt" id="one-ecom-products-search" name="one-ecom-products-search" placeholder="Search all products..">
                        <div class="input-group-append">
                            <span class="input-group-text bg-body border-0">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END Search Form -->

            <!-- All Products Table -->
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">ID</th>
                            <th class="d-none d-md-table-cell">Product</th>
                            <th>Status</th>
                            <th class="d-none d-sm-table-cell text-right">Harga</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($katalog as $_katalog)
                            <tr>
                                <td class="text-center font-size-sm">
                                    <a class="font-w600" href="be_pages_ecom_product_edit.html">
                                        <strong>{{ $_katalog->id }}</strong>
                                    </a>
                                </td>
                                <td class="d-none d-md-table-cell font-size-sm">
                                    <a href="#">
                                        {{ $_katalog->nama }}
                                    </a>
                                </td>
                                <td>
                                    @if($_katalog->stok != 0)
                                        <span class="badge badge-info">
                                            Tersedia
                                        </span>
                                    @else
                                        <span class="badge badge-danger">
                                            Habis
                                        </span>
                                    @endif
                                </td>
                                <td class="text-right d-none d-sm-table-cell font-size-sm">
                                    <strong>RP.{{ $_katalog->harga }}</strong>
                                </td>
                                <td class="text-center font-size-sm">
                                    <a class="btn btn-sm btn-alt-info" 
                                    href="{{ route('pengelola.katalog.edit', [
                                        'katalog' => $_katalog->id
                                    ]) }}" 
                                    data-toggle="tooltip" title="Edit">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pengelola.katalog.destroy', [
                                        'katalog' => $_katalog->id
                                    ]) }}"
                                        method="POST"
                                        style="display: inline"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-alt-danger"
                                            type="submit"
                                            data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-times-circle"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END All Products Table -->

            <!-- Pagination -->
            {{-- <nav aria-label="Photos Search Navigation">
                <ul class="pagination pagination-sm justify-content-end mt-2">
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                            Prev
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="javascript:void(0)">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)" aria-label="Next">
                            Next
                        </a>
                    </li>
                </ul>
            </nav> --}}
            <!-- END Pagination -->
        </div>
    </div>
    <!-- END All Products -->
@endsection

@section('js_after')
    <script src="{{ asset('assets/oneui/js/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/oneui/js/pages/be_pages_ecom_dashboard.min.js') }}"></script>
@endsection