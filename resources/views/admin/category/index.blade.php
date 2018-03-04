@extends('layouts.admin')

@section('content')
    <!--Panel-->
    <div class="card card-default w-100">
        <div class="card-header white-text">
            Categories
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
            <a href="{{route('admin.category.create')}}" class="btn btn-outline-success waves-effect float-right"><i class="fas fa-plus"></i> Add category</a>
            <div class="dataTables_wrapper">
                <table id="categoryList" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if($categories)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{route('admin.category.edit', $category->id)}}">
                                        <i class="far fa-2x fa-edit cyan-text"></i>
                                    </a>
                                    <a href="" onclick="event.preventDefault(); return confirm('Are you sure?') ? document.getElementById('destroy-form-{{$category->id}}').submit() : false">
                                        <i class="fas fa-2x fa-trash-alt red-text"></i>
                                    </a>
                                    <form id="destroy-form-{{$category->id}}" action="{{route('admin.category.destroy', $category->id)}}" method="POST" style="display:none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        {{--<button type="submit"><i class="fas fa-2x fa-trash-alt red-text"></i></button>--}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>There are currently no categories</tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/.Panel-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#categoryList').DataTable();
            $("select[name='categoryList_length']").css({"height": "100%"});
        });
    </script>
@endpush