@extends('layouts.app', ['class' => 'login-page', 'page' => __('Register Page'), 'contentClass' => 'login-page'])

@section('content')
<div class="col-lg-4 col-md-6 ml-auto mr-auto">
    <form class="form" method="post" action="{{ route('register') }}">
        @csrf
        <div class="card card-login card-white">
            <br>
            <div style="text-align:center">
                <h2 style="text-align:center text-primary">SIGN IN</h2>
                <img src="{{ asset('white') }}/img/alisha.jpg" alt="Image" height="100" width="100">
                <br>
                <br>
                <br>
                <div class="card card-login card-white">
                    <div class="card-body">
                        {{-- <p class="text-dark mb-2">Sign in with <strong>admin@white.com</strong> and the password <strong>secret</strong></p> --}}
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name Perusahaan') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" placeholder="{{ __('Password') }}" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="input-group{{ $errors->has('password_confirmation ') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation ') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'password_confirmation '])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">{{ __('Register') }}</button>
                        <div class="pull-left">
                            <h6>
                                <a href="{{ route('login') }}" class="link footer-link">{{ __('Login') }}</a>
                            </h6>
                        </div>
                        <div class="pull-right">
                            <h6>
                                <a href="{{ route('password.request') }}" class="link footer-link">{{ __('Forgot password?') }}</a>
                            </h6>
                        </div>
                    </div>
                </div>
    </form>
</div>
@endsection