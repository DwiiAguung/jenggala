@extends('base')

@section('css_after')
    <style>
        @media only screen and (max-width: 768px) {
            #table-pesanan {
                max-height: 40vh;
            }
        } 
    </style>
@endsection

@section('judul', 'Pesanan | Jenggala Kops')

@section('header')
    @include('guest._partials.header')
@endsection

@section('hero')
    @include('guest._partials.hero')
@endsection

@section('content')
    @include('guest._partials.pesanan')
@endsection

@section('js_after')

@endsection