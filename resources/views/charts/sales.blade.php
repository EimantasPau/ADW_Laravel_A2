@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card w-100">
                <div class="card-header">
                    Sales statistics
                </div>
                <div class="card-body">
                    {!! $chart->html() !!}

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <!--Panel-->
            <div class="card card-default w-100">
                <div class="card-header white-text">
                    Charts
                </div>
                <div class="card-body sidenav-list">
                    <div class="widget-wrapper w-100">
                        <div class="list-group">
                            <a href="{{route('admin.chart.users')}}" class="list-group-item waves-effect {{ Nav::isResource('charts', '/admin') }}">User statistics</a>
                            <a href="" class="list-group-item waves-effect">Product statistics</a>
                            <a href="" class="list-group-item waves-effect">Sales statistics</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    {!! Charts::styles() !!}
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    {!! $chart->script()!!}
@endpush