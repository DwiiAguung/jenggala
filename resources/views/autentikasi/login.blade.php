@extends('base')

@section('judul', 'Jenggala Kops | Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="block block-rounded block-themed mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Sign In</h3>
                </div>
                <div class="block-content">
                    @if (session('errorLogin'))
                        <div class="alert alert-danger">
                            {{ session('errorLogin') }}
                        </div>
                    @endif
                    <div class="p-sm-3 px-lg-4 py-lg-5">
                        <h1 class="h2 mb-1">OneUI</h1>
                        <p class="text-muted">
                            Welcome, please login.
                        </p>

                        <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="py-3">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="email" placeholder="Username">
                                    @error('email')
                                        <small class="text-danger">
                                            <b><i>{{ $message }}</i></b>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-alt form-control-lg" id="login-password" name="password" placeholder="Password">
                                    @error('password')
                                        <small class="text-danger">
                                            <b><i>{{ $message }}</i></b>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-xl-5">
                                    <button type="submit" class="btn btn-block btn-alt-primary">
                                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    {{-- Oauth Google --}}
                                    <a href="{{ route('login-google') }}" class="btn btn-block btn-outline-dark mr-1 mb-3">
                                        <i class="fab fa-google mr-1"></i> Login with Google
                                    </a>        
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection