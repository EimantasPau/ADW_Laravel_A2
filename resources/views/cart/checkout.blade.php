@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-3 col-lg-6">
                <div class="card card-default">
                    <div class="card-header white-text">
                        Payment
                    </div>

                    <div class="card-body">
                        {{--<form action="{{route('cart.checkout')}}" enctype="multipart/form-data" method="POST">--}}
                            {{--@csrf--}}
                            {{--<div class="md-form">--}}
                                {{--<input id="name" type="text" class="form-control" name="name">--}}
                                {{--<label for="name">Cardholder name</label>--}}
                            {{--</div>--}}
                            {{--<div class="md-form">--}}
                                {{--<input id="address" type="text" class="form-control" name="address">--}}
                                {{--<label for="address">Shipping address</label>--}}
                            {{--</div>--}}
                            {{--<div class="md-form">--}}
                                {{--<input id="number" type="text" class="form-control" name="number">--}}
                                {{--<label for="number">Card number</label>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col">--}}
                                    {{--<div class="md-form">--}}
                                        {{--<input id="exp_month" type="text" class="form-control" name="exp_month">--}}
                                        {{--<label for="exp_month">Expiry month</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                               {{--<div class="col">--}}
                                   {{--<div class="md-form">--}}
                                       {{--<input id="exp_year" type="text" class="form-control" name="exp_year">--}}
                                       {{--<label for="exp_year">Expiry year</label>--}}
                                   {{--</div>--}}
                               {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="md-form">--}}
                                {{--<input id="cvc" type="text" class="form-control" name="cvc">--}}
                                {{--<label for="cvc">CVC</label>--}}
                            {{--</div>--}}
                            {{--<div class="md-form">--}}
                                {{--<p class="p-3 primary-color text-white text-center">Order total: £{{$total}}</p>--}}
                            {{--</div>--}}
                            {{--<div class="text-center">--}}
                                {{--<button type="submit" class="btn btn-outline-primary waves-effect">Make payment</button>--}}
                                {{--<a href="{{route('home')}}" class="btn btn-outline-danger waves-effect">Cancel</a>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                        <form action="{{route('order.charge')}}" method="post" id="payment-form">
                            @csrf
                            <div class="form-row">
                                <label for="card-element">

                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <hr>
                            <div class="md-form">
                            <p class="p-3 primary-color text-white text-center">Order total: £{{$total}}</p>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-primary waves-effect">Make payment</button>
                                <a href="{{route('home')}}" class="btn btn-outline-danger waves-effect">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.Panel-->
            </div>
        </div>
    </div>
@endsection
