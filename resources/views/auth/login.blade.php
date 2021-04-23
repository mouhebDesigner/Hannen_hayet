@extends('layouts.master')

@section('content')
<div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Interface de connexion</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control"  placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control"    placeholder="Mot de passe">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Connecter</button>
              </div>
            </div><!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Mot de pass oublié') }}
            </a>
        @endif
        
        

      </div><!-- /.login-box-body -->
    </div>
@endsection
