@extends('layouts.admin')

@section('content')
    <div class="col-lg-6 d-flex align-items-stretch">
        <!--Panel-->
            <div class="card card-default w-100">
                <div class="card-header white-text">
                    Add a new product
                </div>
                <div class="card-body">
                    <form action="{{route('admin.product.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="md-form">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                            <label for="name">Product name</label>
                            @if ($errors->has('name'))
                                <span class="red-text">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="md-form">
                            <textarea id="description" class="md-textarea {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ old('description') }}</textarea>
                            <label for="description">Product description</label>
                            @if ($errors->has('description'))
                                <span class="red-text">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="md-form">
                            <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}">
                            <label for="price">Product price</label>
                            @if ($errors->has('price'))
                                <span class="red-text">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="md-form">
                            <input id="quantity" type="number" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ old('quantity') }}">
                            <label for="quantity">Product quantity</label>
                            @if ($errors->has('quantity'))
                                <span class="red-text">{{ $errors->first('quantity') }}</span>
                            @endif
                        </div>
                        <div class="file-field">
                            <label for="image_name">Product image</label>
                            <div class="btn btn-primary btn-sm">
                                <input id="image_path" type="file" class="{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path" value="{{ old('image_path') }}">
                            </div>

                            @if ($errors->has('image_path'))
                                <span class="red-text">{{ $errors->first('image_path') }}</span>
                            @endif
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary waves-effect">Create product</button>
                            <a href="{{route('admin.product.index')}}" class="btn btn-outline-danger waves-effect">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.Panel-->
    </div>
@endsection

