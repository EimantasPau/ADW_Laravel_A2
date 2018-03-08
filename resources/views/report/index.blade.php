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
                        <option value="product">Products</option>
                        <option value="order">Orders</option>
                    </select>
                    <div class="row mt-4">
                        <div class="col">
                            <datepicker placeholder="Date from" name="dateFrom" format="yyyy-MM-dd"></datepicker>
                            @if ($errors->has('dateFrom'))
                                <span class="red-text">{{ $errors->first('dateFrom') }}</span>
                            @endif
                        </div>
                        <div class="col">
                            <datepicker placeholder="Date to" name="dateTo" format="yyyy-MM-dd"></datepicker>
                            @if ($errors->has('dateTo'))
                                <span class="red-text">{{ $errors->first('dateTo') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="mt-4" v-if="isUserReport">
                        <h4 class="h4-responsive">User report</h4>
                        <label for="reportModel">Order by</label>
                        <select name="userOrderBy" id="reportModel" class="custom-select w-100">
                            <option value="name">Name</option>
                            <option value="created_at">Registration date</option>
                        </select>
                    </div>


                    <div class="mt-4" v-if="isProductReport">Product report</div>
                    <div class="mt-4" v-if="isOrderReport">Order report</div>


                    <div v-if="reportModel !== ''">
                        <label for="" class="mt-4">Order</label>
                        <div class="d-block">
                            <input type="radio" name="order" value="asc" id="asc" checked="checked">
                            <label for="asc">Ascending</label>
                        </div>
                        <div class="d-block">
                            <input type="radio" name="order" value="desc" id="desc">
                            <label for="desc">Descending</label>
                        </div>

                        <label for="" class="mt-4">Report type</label>
                        <div class="d-block">
                            <input type="radio" name="reportType" value="pdf" id="pdf" checked="checked">
                            <label for="pdf">PDF</label>
                        </div>
                        <div class="d-block">
                            <input type="radio" name="reportType" value="excel" id="excel">
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
@endpush


