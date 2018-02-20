@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                            <label for="name">Your name</label>
                            @if ($errors->has('name'))
                            <span class="red-text ml-5">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                            <label for="email">Your email</label>
                            @if ($errors->has('email'))
                            <span class="red-text ml-5">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                            <label for="password">Your password</label>
                            @if ($errors->has('password'))
                                <span class="red-text ml-5">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation">
                            <label for="password_confirmation">Confirm password</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary waves-effect">Sign up</button>
                        </div>
                        <div class="modal-footer">
                            <p>Already have an account? <a href="{{route('login')}}">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
