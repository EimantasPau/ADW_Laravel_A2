@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">
    <!--Panel-->
    <div class="card card-default w-100">
        <div class="card-header">
            Edit the category
        </div>
        <div class="card-body">
            <form action="{{route('admin.category.update', $category->id)}}" method="POST">
                @csrf
                {{ method_field('put') }}
                <div class="md-form">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $category->name }}">
                    <label for="name">Category name</label>
                    @if ($errors->has('name'))
                        <span class="red-text">{{ $errors->first('name') }}</span>
                    @endif
                    <small class="form-text text-muted">
                        <i class="fas fa-question-circle"></i> Please enter the category name here. You will be able to use it to categorize your products.
                    </small>
                    <hr>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary waves-effect">Update category</button>
                    <a href="{{route('admin.category.index')}}" class="btn btn-outline-danger waves-effect">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <!--/.Panel-->
    </div>
@endsection
