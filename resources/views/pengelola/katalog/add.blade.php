@extends('base')

@section('judul', 'Tambah Katalog | Jenggala Kops')

@section('sidebar')
    @include('pengelola._partials.sidebar')
@endsection

@section('header')
    @include('pengelola._partials.header')
@endsection

@section('content')
    <!-- Info -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tambah Data</h3>
        </div>
        <div class="block-content">

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <form action="{{ route('pengelola.katalog.store') }}" 
                        enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="one-ecom-product-name">Nama</label>
                            <input type="text" class="form-control" id="one-ecom-product-name" name="nama" value="{{ old('nama') }}">
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
                                        {{ old('kategori') == $_kategori->id ? 'selected' : '' }}    
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
                                value="{{ old('harga') }}">
                                @error('harga')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="one-ecom-product-stock">Stok</label>
                                <input type="text" class="form-control" id="one-ecom-product-stock" name="stok"
                                value="{{ old('stok') }}">
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