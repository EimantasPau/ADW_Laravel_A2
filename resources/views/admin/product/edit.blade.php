@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">
        <!--Panel-->
        <div class="card card-default w-100">
            <div class="card-header white-text">
               Update product details
            </div>
            <div class="card-body">
                <form action="{{route('admin.product.update', $product->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    {{ method_field('put') }}
                    <div class="md-form">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $product->name}}">
                        <label for="name">Product name</label>
                        @if ($errors->has('name'))
                            <span class="red-text">{{ $errors->first('name') }}</span>
                        @endif
                        <small class="form-text text-muted">
                            <i class="fas fa-question-circle"></i> Please enter your product name here. This will be used as the title on the product page.
                        </small>
                        <hr>
                    </div>
                    <div class="md-form">
                        <textarea id="description" class="md-textarea {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ $product->description }}</textarea>
                        <label for="description">Product description</label>
                        @if ($errors->has('description'))
                            <span class="red-text">{{ $errors->first('description') }}</span>
                        @endif
                        <small class="form-text text-muted">
                            <i class="fas fa-question-circle"></i> Please enter a description for your product. It should describe what the product is and list it's main features.
                        </small>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="md-form">
                                <input step="0.01" id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $product->price }}">
                                <label for="price">Product price</label>
                                @if ($errors->has('price'))
                                    <span class="red-text">{{ $errors->first('price') }}</span>
                                @endif
                                <small class="form-text text-muted">
                                    <i class="fas fa-question-circle"></i> Decide on the price that you wish to sell the item for in pounds(£).
                                </small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <input id="quantity" type="number" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ $product->quantity }}">
                                <label for="quantity">Product quantity</label>
                                @if ($errors->has('quantity'))
                                    <span class="red-text">{{ $errors->first('quantity') }}</span>
                                @endif
                                <small class="form-text text-muted">
                                    <i class="fas fa-question-circle"></i> Enter the number of products that you wish to add.
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="md-form">
                        <select class="custom-select w-100" name="category_id">
                            <option disabled selected>Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == $product->category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                            <span class="red-text">{{ $errors->first('category_id') }}</span>
                        @endif
                        <small class="form-text text-muted">
                            <i class="fas fa-question-circle"></i> Select the category that the item belongs to.
                        </small>
                        <hr>
                    </div>
                    <div class="text-center">
                        <img src="{{asset(Storage::url($product->image_path))}}" alt="" class="img-fluid">
                    </div>
                    <div class="file-field">
                        <div class="btn btn-primary btn-sm"  data-toggle="tooltip" data-placement="top" title="Recommended image size is 400x400 pixels.">
                            <input id="image_path" type="file" class="{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path" value="">
                        </div>
                        @if ($errors->has('image_path'))
                            <span class="red-text">{{ $errors->first('image_path') }}</span>
                        @endif
                        <small class="form-text text-muted">
                            <i class="fas fa-question-circle"></i> Choose a photo which will be used on the product page.
                        </small>
                        <hr>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary waves-effect">Update product</button>
                        <a href="{{route('admin.product.index')}}" class="btn btn-outline-danger waves-effect">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!--/.Panel-->
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush

