@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card w-100">
                <div class="card-header">
                    User statistics
                </div>
                <div class="card-body">
                    {!! $chart->html() !!}
                    <form action="{{route('admin.chart.users')}}" method="GET">
                        @csrf
                        <h4 class="h4-responsive">Options</h4>
                        <div class="row">
                            <div class="col" id="userChartOptions">
                                <label for="groupBy">Group by</label>
                                <select name="groupBy" id="groupBy" class="custom-select w-100" v-model="groupBy">
                                    <option value="Day" {{ old('category_id') == 1 ? 'selected' : '' }}>Day</option>
                                    <option value="Month" {{ old('category_id') == 1 ? 'selected' : '' }}>Month</option>
                                    <option value="Year" {{ old('category_id') == 1 ? 'selected' : '' }}>Year</option>
                                </select>
                                <div v-if="isGroupByDay" class="mt-4">
                                    <label for="month">Month</label>
                                    <select name="month" id="month" class="custom-select w-100">
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div v-if="isGroupByMonth || isGroupByDay" class="mt-4">
                                    <label for="year">Year</label>
                                    <select name="year" id="year" class="custom-select w-100">
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary mt-4">View chart</button>
                    </form>
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
    {!! Charts::styles(['chartjs']) !!}
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    {!! $chart->script()!!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>

    <script>
        var userChartOptions = new Vue({
            el: '#userChartOptions',
            data: {
                groupBy: 'Year'
            },
            computed: {
                isGroupByDay: function() {
                    return this.groupBy === 'Day';
                },
                isGroupByMonth: function() {
                    return this.groupBy === 'Month';
                },
                isGroupByYear: function() {
                    return this.groupBy === 'Year';
                }
            }

        });
    </script>
@endpush