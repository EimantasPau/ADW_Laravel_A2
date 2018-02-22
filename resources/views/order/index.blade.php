@extends('layouts.app')

@section('content')
    <!--Main layout-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-2 offset-1 d-flex align-items-stretch">
                <div class="widget-wrapper w-100">
                    <div class="list-group">
                        <a href="{{route('order.index')}}" class="list-group-item active">My orders</a>
                        <a href="" class="list-group-item">Settings</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card card-default w-100">
                    <div class="card-header white-text">
                        Your orders
                    </div>
                    <div class="card-body">
                        <!--Table-->
                        <table class="table table-hover table-bordered table-responsive-md">
                            <!--Table head-->
                            <thead>
                            <tr>
                                <th class="text-center">Order ID</th>
                                <th class="text-center">Products</th>
                                <th class="text-center">Paid</th>
                                <th class="text-center">Time of purchase</th>
                            </tr>
                            </thead>
                            <!--Table head-->
                            <!--Table body-->
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="text-center align-middle">{{$order->id}}</td>
                                    <td class="text-center align-middle">
                                        @foreach($order->products as $product)
                                        <p>{{$product->name}} x {{$product->pivot->line_quantity}}</p>
                                        @endforeach
                                    </td>
                                    <td class="text-center align-middle">£{{$order->total_price}}</td>
                                    <td class="text-center align-middle">{{$order->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <!--Table body-->

                        </table>
                        <!--Table-->
                    </div>
                </div>
                <!--/.Panel-->
            </div>
        </div>
    </div>
    <!--/.Main layout-->
@endsection
