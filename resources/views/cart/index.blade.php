@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-2">
                @if(!Cart::isEmpty())
                    <h1>You cart</h1>
                    <table class="table table-hover table-responsive-md table-bordered">

                        <!--Table head-->
                        <thead class="mdb-color darken-3">
                        <tr class="text-white">
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th></th>
                            {{--<th></th>--}}
                        </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                        @foreach($cartItems as $index => $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>£{{$item->price}}</td>
                                <td>
                                    <div class="text-center">
                                        <a href=""><i class="fas fa-2x fa-plus text-success"></i></a> <a href=""><i class="fas fa-2x fa-minus text-danger"></i></a>
                                    </div>
                                </td>
                                {{--<td>--}}
                                {{--<button type="button" class="btn btn-outline-danger">- 1</button>--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                {{--<button type="button" class="btn btn-outline-success">+ 1</button>--}}
                                {{--</td>--}}
                            </tr>
                        @endforeach
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>{{Cart::getTotalQuantity()}}</strong></td>
                            <td><strong>£{{Cart::getTotal()}}</strong></td>
                            <td>
                                <form action="{{route('cart.clear')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Clear cart</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                        <!--Table body-->
                    </table>
                    <!--Table-->
                    <button type="button" class="btn btn-outline-info waves-effect float-right">Proceed to checkout</button>
                    @else
                    <h1>Your cart is empty.</h1>
                @endif

            </div>
        </div>
    </div>
@endsection