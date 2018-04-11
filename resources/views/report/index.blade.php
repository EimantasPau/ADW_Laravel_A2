@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">
        <!--Panel-->
        <div class="card w-100">
            <div class="card-header">
                Reports
            </div>
            <div class="card-body">
                <form action="{{route('admin.report.generate')}}" method="GET" id="reportFormContainer">
                    <label for="reportModel">Create report for</label>
                    <select name="reportModel" id="reportModel" class="custom-select w-100" v-model="reportModel">
                        <option value="user">Users</option>
                        <option value="order">Orders</option>
                    </select>
                    <div class="row mt-4">
                        <div class="col">
                            <div class="md-form">
                                <datepicker placeholder="Date from" name="dateFrom" v-model="dateFrom" format="yyyy-MM-dd"></datepicker>
                                @if ($errors->has('dateFrom'))
                                    <span class="red-text">{{ $errors->first('dateFrom') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                           <div class="md-form">
                               <datepicker placeholder="Date to" name="dateTo" v-model="dateTo" format="yyyy-MM-dd"></datepicker>
                               @if ($errors->has('dateTo'))
                                   <span class="red-text">{{ $errors->first('dateTo') }}</span>
                               @endif
                           </div>
                        </div>
                    </div>
                    <div class="md-form">
                        <input id="documentTitle" type="text" class="form-control{{ $errors->has('documentTitle') ? ' is-invalid' : '' }}" name="documentTitle" value="{{ old('documentTitle') }}">
                        <label for="documentTitle">Document title</label>
                        @if ($errors->has('documentTitle'))
                            <span class="red-text">{{ $errors->first('documentTitle') }}</span>
                        @endif
                    </div>


                    <div class="mt-4" v-if="isUserReport">
                        <h4 class="h4-responsive">User report</h4>
                        <label for="reportModel">Order by</label>
                        <select name="userOrderBy" v-model="userOrderBy" class="custom-select w-100">
                            <option value="name">Name</option>
                            <option value="created_at">Registration date</option>
                        </select>
                    </div>

                    <div class="mt-4" v-if="isOrderReport">
                        <h4 class="h4-responsive">Order report</h4>
                        <label for="reportModel">Order by</label>
                        <select name="orderOrderBy" v-model="orderOrderBy" class="custom-select w-100">
                            <option value="total_price">Total price</option>
                            <option value="created_at">Order date</option>
                        </select>
                    </div>


                    <div v-if="reportModel !== ''">
                        <label for="" class="mt-4">Order</label>
                        <div class="d-block">
                            <input type="radio" name="order" value="asc" v-model="order" id="asc" checked="checked">
                            <label for="asc">Ascending</label>
                        </div>
                        <div class="d-block">
                            <input type="radio" name="order" value="desc" v-model="order" id="desc">
                            <label for="desc">Descending</label>
                        </div>

                        <label for="" class="mt-4">Report type</label>
                        <div class="d-block">
                            <input type="radio" name="reportType" value="pdf" v-model="reportType" id="pdf" checked="checked">
                            <label for="pdf">PDF</label>
                        </div>
                        <div class="d-block">
                            <input type="radio" name="reportType" value="excel" v-model="reportType" id="excel">
                            <label for="excel">Excel</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary" v-if="reportModel !== ''">Generate report</button>
                </form>
            </div>
        </div>
        <!--/.Panel-->
    </div>
@endsection

@push('scripts')
    <script>

    </script>
@endpush


