@extends('layouts.admin')
@section('content')
   <div class="row">
       <div class="col-md-9">
           <div class="card w-100">
               <div class="card-header">
                  General statistics
               </div>
               <div class="card-body" id="general-statistics">
                  <div class="row">
                      <div class="col-md-6 col-sm-12 mt-4">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="card-title text-primary text-center"><i class="fas fa-pound-sign"></i> Total sales</h4>
                              </div>
                              <div class="card-footer text-muted primary-color white-text text-center">
                                  <p class="mb-0">£{{$stats['totalSales']}}</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12 mt-4">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="card-title text-center" style="color:#aa66cc;"><i class="fas fa-users"></i> Users</h4>
                              </div>
                              <div class="card-footer text-muted secondary-color white-text text-center">
                                  <p class="mb-0">{{$stats['userCount']}}</p>
                              </div>
                          </div>
                      </div>
                  </div>
                   <div class="row">
                       <div class="col-md-6 col-sm-12 mt-4">
                           <div class="card">
                               <div class="card-body">
                                   <h4 class="card-title text-success text-center"><i class="fas fa-shopping-basket"></i> Products</h4>
                               </div>
                               <div class="card-footer text-muted success-color white-text text-center">
                                   <p class="mb-0">{{$stats['productCount']}}</p>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-6 col-sm-12 mt-4">
                           <div class="card">
                               <div class="card-body">
                                   <h4 class="card-title text-center text-danger"><i class="fas fa-shopping-cart"></i> Orders</h4>
                               </div>
                               <div class="card-footer text-muted danger-color white-text text-center">
                                   <p class="mb-0">{{$stats['orderCount']}}</p>
                               </div>
                           </div>
                       </div>
                   </div>

               </div>
           </div>
       </div>
       @include('partials.chartMenu')
   </div>

@endsection

@push('styles')
    {{--{!! Charts::styles() !!}--}}
@endpush

@push('scripts')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>--}}
    {{--{!! $chart->script()!!}--}}
@endpush