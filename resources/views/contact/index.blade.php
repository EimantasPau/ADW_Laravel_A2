@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">
        <!--Panel-->
        <div class="card w-100">
            <div class="card-header">
                Messages
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

                <div class="dataTables_wrapper">
                    <table id="productList" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Subject</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($messages)
                            @foreach($messages as $message)
                                <tr>
                                    <td><a href="{{route('contact.show', $message->id)}}" class="text-primary">{{$message->subject}}</a></td>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td class="d-flex justify-content-between">
                                        <a href="" onclick="event.preventDefault(); return confirm('Are you sure?') ? document.getElementById('destroy-form-{{$message->id}}').submit() : false">
                                            <i class="fas fa-2x fa-trash-alt red-text"></i>
                                        </a>
                                        <form id="destroy-form-{{$message->id}}" action="{{route('admin.product.destroy', $message->id)}}" method="POST" style="">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            {{--<button type="submit"><i class="fas fa-2x fa-trash-alt red-text"></i></button>--}}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>There are currently no messages</tr>
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