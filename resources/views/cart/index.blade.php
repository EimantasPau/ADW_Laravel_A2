@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(!Cart::isEmpty())
                    <h1>Your cart</h1>
                    <table class="table table-hover table-bordered table-fixed table-responsive-md">

                        <!--Table head-->
                        <thead class="mdb-color darken-3">
                        <tr class="text-white">
                            <th class="text-center">Name</th>
                            <th class="text-center" colspan="2">Quantity</th>
                            <th class="text-center">Price</th>

                        </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                        @foreach($cartItems as $index => $item)
                            <tr>
                                <td class="text-center"><a class="nav-link text-primary" href="{{route('product.show', $item->id)}}">{{$item->name}}</a></td>
                                <td class="text-center">{{$item->quantity}}</td>
                                <td class="text-center">
                                    <a href=""><i class="fas fa-2x fa-plus text-success" style="color: #00C851;"></i></a> <a href=""><i class="fas fa-2x fa-minus text-danger" style="color:#ff3547;"></i></a>
                                </td>
                                <td class="text-center">£{{$item->price}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                        <!--Table body-->
                        <tfoot>
                        <tr>
                            <td class="text-center"><strong>Total</strong></td>
                            <td class="text-center"><strong>{{Cart::getTotalQuantity()}}</strong></td>
                            <td class="text-center">
                                <form action="{{route('cart.clear')}}" method="POST">
                                    @csrf
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-outline-danger">Empty cart</button>
                                    </div>
                                </form>
                            </td>
                            <td class="text-center"><strong>£{{Cart::getTotal()}}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <a href="{{route('order.checkout')}}" class="btn btn-outline-info waves-effect float-right">Proceed to checkout</a>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    <!--Table-->

                    @else
                    <h1>Your cart is empty.</h1>
                @endif

            </div>
        </div>
    </div>
@endsection