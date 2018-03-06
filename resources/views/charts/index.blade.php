@extends('layouts.admin')
@section('content')
   <div class="row">
       <div class="col-md-8">
           <div class="card card-default w-100">
               <div class="card-header white-text">
                  General statistics
               </div>
               <div class="card-body">
                  <div class="row">
                      <div class="col">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="card-title text-primary text-center"><i class="fas fa-pound-sign"></i> Total sales</h4>
                              </div>
                              <div class="card-footer text-muted primary-color white-text text-center">
                                  <p class="mb-0">£{{$stats['totalSales']}}</p>
                              </div>
                          </div>
                      </div>
                      <div class="col">
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
                   <div class="row mt-4">
                       <div class="col">
                           <div class="card">
                               <div class="card-body">
                                   <h4 class="card-title text-success text-center"><i class="fas fa-shopping-basket"></i> Products</h4>
                               </div>
                               <div class="card-footer text-muted success-color white-text text-center">
                                   <p class="mb-0">{{$stats['productCount']}}</p>
                               </div>
                           </div>
                       </div>
                       <div class="col">
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

       <div class="col-md-4">
           <!--Panel-->
           <div class="card card-default w-100">
               <div class="card-header white-text">
                   Charts
               </div>
               <div class="card-body">
                   <div class="widget-wrapper w-100">
                       <div class="list-group">
                           <a href="" class="list-group-item">User charts</a>
                           <a href="" class="list-group-item">Product charts</a>
                           <a href="" class="list-group-item">Sales charts</a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

@endsection

@push('styles')
    {{--{!! Charts::styles() !!}--}}
@endpush

@push('scripts')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>--}}
    {{--{!! $chart->script()!!}--}}
@endpush