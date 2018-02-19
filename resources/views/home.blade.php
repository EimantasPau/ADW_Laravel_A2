@extends('layouts.app')

@section('content')
    <!--Main layout-->
    <div class="container-fluid">
        <div class="row mt-4">

            <!--Sidebar-->
            <div class="col-lg-2 offset-1 wow fadeIn" data-wow-delay="0.2s">

                <div class="widget-wrapper">
                    <h4 class="h4-responsive font-bold mb-3">Categories:</h4>
                    <br>
                    <div class="list-group">
                        <a href="#" class="list-group-item ">Smartphone</a>
                        <a href="#" class="list-group-item active">Laptop</a>
                        <a href="#" class="list-group-item">Camera</a>
                        <a href="#" class="list-group-item">Headphones</a>
                        <a href="#" class="list-group-item">Tablet</a>
                    </div>
                </div>

                <div class="widget-wrapper">
                    <h4 class="h4-responsive font-bold mb-3 mt-4">Price:</h4>
                    <br>
                    <div class="list-group">
                        <a href="#" class="list-group-item active">100$ - 399$</a>
                        <a href="#" class="list-group-item">400$ - 899$</a>
                        <a href="#" class="list-group-item">900$ - 1599$</a>
                        <a href="#" class="list-group-item">1600$ - 7999$</a>
                    </div>
                </div>
            </div>
            <!--/.Sidebar-->

            <!-- Product card-->
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card mb-r wow fadeIn " data-wow-delay="0.4s">
                            <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/16.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="font-bold">
                                    <strong>Product title</strong>
                                    <div class="badge badge-info">New</div>
                                </h5>
                                <hr>
                                <h4>
                                    <strong>150$</strong>
                                </h4>
                                <p class="card-text mt-4">Some quick example text to build on the card title.
                                </p>
                                <a href="#" class="btn btn-outline-success waves-effect w-100"><i class="fas fa-plus"></i> Add to cart </a>
                                <a href="#" class="btn btn-outline-info waves-effect w-100"><i class="fas fa-info-circle"></i> Product information </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Product card-->
        </div>
    </div>
    <!--/.Main layout-->
@endsection
