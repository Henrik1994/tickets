@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top:10%">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" style="left:-3%" class="col-sm-7 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-sm-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" style="left:-4%" class="col-sm-8 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-sm-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" style="left:-7%" class="col-sm-8 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-sm-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-8 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-sm-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                       
                        </div>
                        <p>If You have Account ?  <a href="{{ url('/login') }}">Log In</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
