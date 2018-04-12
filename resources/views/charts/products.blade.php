@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card w-100">
                <div class="card-header">
                    Product statistics
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        {!! $chartCategories->html()!!}
                    </div>
                    <div class="mb-4">
                        {!! $chartProducts->html()!!}
                    </div>

                </div>
            </div>
        </div>
        @include('partials.chartMenu')
    </div>

@endsection

@push('styles')
    {!! Charts::styles(['chartjs']) !!}
@endpush

@push('scripts')
    {!! $chartCategories->script()!!}
    {!! $chartProducts->script()!!}
@endpush