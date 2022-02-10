@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <div class="login-logo">
            <a href="{{ route('admin.home') }}">
                <img src="/img/logo-colegio.png" alt="" width="35%">
            </a>
        </div>
    </div>
    <div class="card" style="background-color: rgba(255,255,255,0.5)">
        <div class="card-body login-card-body">
            <p class="login-box-msg"></p>

            @if(session()->has('message'))
                <p class="alert alert-info">
                    {{ session()->get('message') }}
                </p>
            @endif
                
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" name="email" value="{{ old('email', null) }}">

                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ trans('global.login_password') }}">

                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>


                <div class="row text-center">
                    <div class="col-12">
                        <button type="submit" class=" rounded btn btn-primary btn-flat w-50">
                            {{ trans('global.login') }}
                        </button>
                        <!--<a class="rounded btn btn-primary mt-3 text-white py-3" href="{{ trans('global.login') }}">Ingresar</a>-->
                    </div>
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class=" rounded btn btn-danger btn-flat mt-3 w-50">
                            <a class="text-white" href="{{ url('auth/google') }}"> Ingresa con Google</a>
                        </button>
                       <!-- <a class="rounded btn btn-danger mt-3 text-white fab fa-google py-3" href="{{ url('auth/google') }}"> Ingresa con Google</a>-->
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            @if(Route::has('password.request'))
                <p class="mb-1 mt-2 text-center">
                    <a style="color:black; text-lign:center;" href="{{ route('password.request') }}">
                        {{ trans('global.forgot_password') }}
                    </a>
                </p>
            @endif
            <p class="mb-1">

            </p>
        </div>
        <p class="mb-1 text-center mb-3" >
            <a style="background: blue; color:white; padding:5px" class="text-center" href="{{ route('register') }}">
                {{ trans('global.register') }}
            </a>
        </p>
    </div>
</div>
@endsection
