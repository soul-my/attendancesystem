@extends('layouts.admin-layout-min')

@section('styles')
    <style type="text/css">

        .form-elegant .font-small {
          font-size: 0.8rem; }

        .form-elegant .z-depth-1a {
          -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
          box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25); }

        .form-elegant .z-depth-1-half,
        .form-elegant .btn:hover {
          -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
          box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15); }

    </style>


@endsection


@section('content')
<!--Main layout-->
    <main class="pt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">

        <section class="form-elegant">
            <form method="post" action="{{ route('admin.dologin') }}">
                @csrf

                <!--Form without header-->
                <div class="card">

                    <div class="card-body mx-4">

                        <!--Header-->
                        <div class="text-center">
                            <h3 class="dark-grey-text mb-5"><strong>Log Masuk</strong></h3>
                        </div>

                        <!--Body-->
                        <div class="md-form">
                            <input type="text" id="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                            <label for="email">{{ __('Email') }}</label>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form">
                            <input type="password" id="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            <label for="password">{{ __('Kata Laluan') }}</label>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form">
                            <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember">
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Sign in</button>
                        </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer mx-5 pt-3 mb-1">
                        <div class="row">

                            <p class="font-small grey-text d-flex justify-content-end">Sistem Kehadiran PIBG</p>
                        </div>

                    </div>

                </div>
                <!--/Form without header-->
            </form>

        </section>



            {{-- <div class="card">
                <div class="card-header">ADMIN {{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.dologin') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
    <div style="height: 5px"></div>

    </main>
@endsection
