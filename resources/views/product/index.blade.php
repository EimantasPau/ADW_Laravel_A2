@extends('layouts.admin')

@section('content')
    <!--Panel-->
    <div class="card card-default w-100">
        <div class="card-header white-text">
            Products
        </div>
        <div class="card-body">
            <a href="{{route('product.create')}}" class="btn btn-outline-success waves-effect float-right"><i class="fas fa-plus"></i> Add product</a>
            <div class="dataTables_wrapper">
                <table id="productList" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if($products)
                        @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>£{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td class="d-flex justify-content-between">
                            <a href=""><i class="fas fa-2x fa-eye"></i></a>
                            <a href=""><i class="far fa-2x fa-edit cyan-text"></i></a>
                            <a href="" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();"><i class="fas fa-2x fa-trash-alt red-text"></i></a>
                            <form id="destroy-form" action="{{route('product.destroy', $product->id)}}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        </td>
                    </tr>
                        @endforeach
                        @else
                    <tr>There are currently no products</tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/.Panel-->
@endsection