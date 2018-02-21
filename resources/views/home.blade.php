@extends('layouts.app')

@section('content')
    <!--Main layout-->
    <div class="container-fluid">
        <div class="row mt-4">

            <!--Sidebar-->
            <div class="col-lg-2 offset-1 wow fadeIn" data-wow-delay="0.2s">

                <div class="widget-wrapper">
                    <h4 class="h4-responsive font-bold mb-3">Categories:</h4>
                    <br>
                    <div class="list-group">
                        <a href="#" class="list-group-item ">Smartphone</a>
                        <a href="#" class="list-group-item active">Laptop</a>
                        <a href="#" class="list-group-item">Camera</a>
                        <a href="#" class="list-group-item">Headphones</a>
                        <a href="#" class="list-group-item">Tablet</a>
                    </div>
                </div>

                <div class="widget-wrapper">
                    <h4 class="h4-responsive font-bold mb-3 mt-4">Price:</h4>
                    <br>
                    <div class="list-group">
                        <a href="#" class="list-group-item active">100$ - 399$</a>
                        <a href="#" class="list-group-item">400$ - 899$</a>
                        <a href="#" class="list-group-item">900$ - 1599$</a>
                        <a href="#" class="list-group-item">1600$ - 7999$</a>
                    </div>
                </div>
            </div>
            <!--/.Sidebar-->

            <!-- Product card-->
            <div class="col-lg-8">
                @if($message = session('successMessage'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success!</strong> {{$message}}
                    </div>
                @endif
                <p>Showing {{$products->firstItem()}} to {{$products->lastItem() }} out of {{$products->total()}} </p>
                {{ $products->links() }}
                <div class="row d-flex align-items-stretch">
                @foreach($products->chunk(4) as $chunk)

                    @foreach($chunk as $product)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card mb-r wow fadeIn" data-wow-delay="0.4s">
                            <img class="img-fluid" src="{{asset(Storage::url($product->image_path))}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="font-bold">
                                    <strong>{{$product->name}}</strong>
                                    @if($product->quantity > 0)
                                    <div class="badge badge-info">In stock</div>
                                        @else
                                        <div class="badge badge-danger">Out of stock</div>
                                    @endif
                                </h5>
                                <hr>
                                <h4>
                                    <strong>£{{$product->price}}</strong>
                                </h4>
                                <p class="card-text mt-4">{{str_limit($product->description, 100, '...')}}
                                </p>
                                <a href="{{route('product.show', $product->id)}}" class="btn btn-outline-info waves-effect w-100"><i class="fas fa-info-circle"></i> Product information </a>
                                <form action="{{route('cart.add', $product->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success waves-effect w-100"><i class="fas fa-plus"></i> Add to cart </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    @endforeach

                @endforeach
                </div>
                {{ $products->links() }}
            </div>
            <!--/Product card-->
        </div>
    </div>
    <!--/.Main layout-->
@endsection
