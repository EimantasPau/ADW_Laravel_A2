@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <!-- Form login -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
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
                        @if ($errors->has('socialError'))
                            <span class="red-text ml-5">{{ $errors->first('socialError') }}</span>
                        @endif
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary waves-effect">Login</button>
                        </div>
                    </form>
                    <!-- Form login end -->
                    <!-- Social logins -->
                    <div class="modal-footer row">
                        <div class="col-md-12" id="social-logins">
                            <p class="text-uppercase text-center"> Or login with:</p>
                            <div class="text-center">
                                <a href="{{url('/oauth/facebook')}}" class="btn btn-outline-primary waves-effect "><i class="fab fa-2x fa-facebook-square" style="color:#3b5998;"></i> Facebook</a>
                            </div>
                            <div class="text-center">
                                <a href="{{url('/oauth/google')}}" class="btn btn-outline-primary waves-effect"><i class="fab fa-2x fa-google" style="color:#dd4b39;"></i> Google</a>
                            </div>
                            <div class="text-center">
                                <a href="{{url('/oauth/twitter')}}" class="btn btn-outline-primary waves-effect"><i class="fab fa-2x fa-twitter" style="color:#00aced;"></i> Twitter</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer row">
                        <div class="col-md-12">
                            <p>Forgot <a class="" href="{{ route('password.request') }}">password?</a></p>
                            <p>Not a member? <a href="{{route('register')}}">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
