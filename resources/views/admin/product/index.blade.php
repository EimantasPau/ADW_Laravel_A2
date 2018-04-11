@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">
        <!--Panel-->
        <div class="card w-100">
            <div class="card-header">
                Products
            </div>
            <div class="card-body">
                @if($message = session('successMessage'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success!</strong> {{$message}}
                    </div>
                @endif
                @if($message = session('errorMessage'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Sorry.</strong> {{$message}}
                    </div>
                @endif
                <a href="{{route('admin.product.create')}}" class="btn btn-outline-success waves-effect float-right"><i class="fas fa-plus"></i> Add product</a>
                <div class="dataTables_wrapper">
                    <table id="productList" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($products)
                            @foreach($products as $product)
                                <tr>
                                    <td><a href="{{route('product.show', $product->id)}}" class="text-primary">{{$product->name}}</a></td>
                                    <td>£{{$product->price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td class="d-flex justify-content-between">
                                        {{--<a href="{{route('product.show', $product->id)}}">--}}
                                        {{--<i class="fas fa-2x fa-eye"></i>--}}
                                        {{--</a>--}}
                                        <a href="{{route('admin.product.edit', $product->id)}}">
                                            <i class="far fa-2x fa-edit cyan-text"></i>
                                        </a>
                                        <a href="" onclick="event.preventDefault(); return confirm('Are you sure?') ? document.getElementById('destroy-form-{{$product->id}}').submit() : false">
                                            <i class="fas fa-2x fa-trash-alt red-text"></i>
                                        </a>
                                        <form id="destroy-form-{{$product->id}}" action="{{route('admin.product.destroy', $product->id)}}" method="POST" style="">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            {{--<button type="submit"><i class="fas fa-2x fa-trash-alt red-text"></i></button>--}}
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
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#productList').DataTable();
            $("select[name='productList_length']").css({"height": "100%"});
        });
    </script>
@endpush