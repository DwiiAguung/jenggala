@extends('base')

@section('judul', 'Edit Katalog | Jenggala Kops')

@section('sidebar')
    @include('pengelola._partials.sidebar')
@endsection

@section('header')
    @include('pengelola._partials.header')
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <a class="block block-rounded block-link-shadow text-center" href="#">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 text-dark">{{ $katalog->stok }}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="font-w600 font-size-sm text-info mb-0">
                        Tersedia
                    </p>
                </div>
            </a>
        </div>
        <div class="col-lg-12 col-12">
            <a class="block block-rounded block-link-shadow text-center" href="#">
                <div class="block-content block-content-full">
                    <img src="{{ 
                                !$katalog->gambar ? 
                                asset('assets/img/2.png') : 
                                asset('storage/produk/' . $katalog->gambar)
                        }}" 
                    >
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="font-w600 font-size-sm text-muted mb-0">
                        Gambar
                    </p>
                </div>
            </a>
        </div>
    </div>

    <!-- Info -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Data</h3>
        </div>
        <div class="block-content">

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <form action="{{ route('pengelola.katalog.update', ['katalog' => $katalog->id]) }}" 
                        enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="one-ecom-product-name">Nama</label>
                            <input type="text" class="form-control" id="one-ecom-product-name" name="nama" value="{{ old('nama', $katalog->nama) }}">
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="one-ecom-product-category">Kategori</label>
                            <select class="js-select2 form-control" id="one-ecom-product-category" name="kategori" style="width: 100%;" data-placeholder="Choose one..">
                                <option></option>
                                @foreach ($kategori as $_kategori)
                                    <option value="{{ $_kategori->id }}"
                                        {{ old('kategori', $katalog->kategori_katalog_id) == $_kategori->id ? 'selected' : '' }}    
                                    >
                                        {{ $_kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="one-ecom-product-price">Harga</label>
                                <input type="text" class="form-control" id="one-ecom-product-price" name="harga"
                                value="{{ old('harga', $katalog->harga) }}">
                                @error('harga')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="one-ecom-product-stock">Stok</label>
                                <input type="text" class="form-control" id="one-ecom-product-stock" name="stok"
                                value="{{ old('stok', $katalog->stok) }}">
                                @error('stok')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="one-ecom-product-description-short">Deskripsi</label>
                            <textarea class="form-control" id="one-ecom-product-description-short" name="deskripsi" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="d-block" for="example-file-input">Gambar</label>
                            <input type="file" id="example-file-input" name="gambar">
                            @error('gambar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-alt-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Info -->
@endsection

@section('js_after')
    <script src="{{ asset('assets/oneui/js/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/oneui/js/pages/be_pages_ecom_dashboard.min.js') }}"></script>
@endsection