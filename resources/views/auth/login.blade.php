@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top:10%">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/login') }}" >
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-8 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-sm-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" style="left:3%"  class="col-sm-7 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-sm-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                     Login 
                                </button>
                            </div>
                        </div>

                        <p>If You dont have Account ?  <a href="{{ url('/register')}}"> Register </a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
