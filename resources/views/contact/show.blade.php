@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">
        <!--Panel-->
        <div class="card w-100">
            <div class="card-header">
                {{$message->subject}}
            </div>
            <div class="card-body">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">{{$message->body}}</p>
                    <footer class="blockquote-footer">From {{$message->name}}, {{$message->email}}</footer>
                </blockquote>
                <div class="text-center">
                    <a href="{{route('contact.index')}}" class="btn btn-outline-info waves-effect">Back to message list</a>
                </div>
            </div>
        </div>
        <!--/.Panel-->
    </div>
@endsection