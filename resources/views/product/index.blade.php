@extends('layouts.app')

@section('content')
    <!--Main layout-->
    <div class="container-fluid">
        <div class="row mt-4">

            <!--Sidebar-->
            <div class="col-lg-2 offset-xl-1 wow fadeIn" data-wow-delay="0.2s">
                <div class="card w-100">
                    <div class="card-header">
                        <i class="fa fa-search"></i> Search
                    </div>
                    <div class="card-body">
                        <form action="{{route('product.index')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="md-form">
                                <input type="text" id="search" class="form-control" name="search">
                                <label for="search">Search for</label>
                            </div>
                            <div class="md-form">
                                <select class="custom-select w-100" name="category_id">
                                    <option disabled selected>Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="md-form">
                                <input step="0.01" type="number" id="minimumPrice" class="form-control" name="minimumPrice">
                                <label for="minimumPrice">Minimum price</label>
                            </div>
                            <div class="md-form">
                                <input step="0.01" type="number" id="maximumPrice" class="form-control" name="maximumPrice">
                                <label for="maximumPrice">Maximum price</label>
                            </div>
                            <div class="md-form">
                                <select class="custom-select w-100" name="orderBy">
                                    <option disabled selected>Order by</option>
                                    <option value="price">Price</option>
                                    <option value="quantity">Quantity</option>
                                </select>
                            </div>
                            <div class="md-form">
                                <select class="custom-select w-100" name="paginate">
                                    <option disabled selected>Results per page</option>
                                    <option value="6">6</option>
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="48">48</option>
                                </select>
                            </div>
                            <div class="md-form">
                                <button type="submit" class="btn btn-primary w-100">Search!</button>
                            </div>
                        </form>

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
                @if($message = session('errorMessage'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Sorry.</strong> {{$message}}
                    </div>
                @endif
                @if($message = session('searchMessage'))
                    <div class="alert alert-info" role="alert">
                        <strong>Showing results for: </strong> {{$message}}
                    </div>
                @endif
                @if(count($products) > 0)
                     <p class="mt-sm-4">Showing {{$products->firstItem()}} to {{$products->lastItem() }} out of {{$products->total()}} </p>
                @else
                     <p class="mt-sm-4">No products found.</p>
                @endif
                {{ $products->links() }}
                {{--{{ $products->links() }}--}}
                <div class="row d-flex align-items-stretch">
                    @foreach($products as $product)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="card mb-r wow fadeIn align-items-stretch" data-wow-delay="0.4s">
                                <img style="margin: auto; width: auto; height: 250px; max-width: 100%;" class="img-responsive" src="{{asset('images/' . ($product->image_path))}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="font-bold text-center">
                                        <strong style="white-space: nowrap;">{{$product->name}}</strong>
                                    </h5>
                                    @if($product->quantity > 0)
                                        <div class="text-center">
                                            <span class="badge badge-info">In stock</span>
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <span class="badge badge-danger">Out of stock</span>
                                        </div>
                                    @endif
                                    <hr>
                                    <h5 class="d-flex justify-content-between">
                                        <span>{{$product->category->name}}</span>
                                        <span><strong>£{{$product->price}}</strong></span>
                                    </h5>
                                    <p class="card-text mt-4" style="min-height: 100px;">{{str_limit($product->description, 100, '...')}}
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

                </div>
                {{ $products->links() }}
            </div>
            <!--/Product card-->
        </div>
    </div>
    <!--/.Main layout-->
@endsection
