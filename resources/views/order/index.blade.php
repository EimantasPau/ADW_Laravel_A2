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
                <div class="card w-100">
                    <div class="card-header">
                        Your orders
                    </div>
                    <div class="card-body">
                       @if(count($orders) > 0)
                           <!--Table-->
                               <table class="table table-striped table-bordered table-responsive-md" id="user-order-list" cellspacing="0" width="100%">
                                   <!--Table head-->
                                   <thead>
                                   <tr>
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
                                           <td class="text-left align-middle">
                                               @foreach($order->products as $product)
                                                   <p><img src="{{asset(Storage::url($product->image_path))}}" alt="" class="img-fluid" style="max-width: 100px">{{$product->name}} x {{$product->pivot->line_quantity}}</p>
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
                           @else
                           <p>You have no orders right now.</p>
                        @endif
                    </div>
                </div>
                <!--/.Panel-->
            </div>
        </div>
    </div>
    <!--/.Main layout-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#user-order-list').DataTable();
            $("select[name='user-order-list_length']").css({"height": "100%"});
        });
    </script>
@endpush
