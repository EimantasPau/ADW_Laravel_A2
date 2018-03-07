@extends('layouts.admin-charts-reports')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header">
                    Product statistics
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        {!! $chartCategories->html() !!}
                    </div>
                    <div class="mb-4">
                        {!! $chartProducts->html() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    {!! Charts::styles(['chartjs']) !!}
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    {!! $chartCategories->script()!!}
    {!! $chartProducts->script()!!}
@endpush