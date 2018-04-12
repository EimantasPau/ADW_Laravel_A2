<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <!-- Styles -->
    @stack('styles')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark mdb-color darken-3 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin dashboard</a>
            <a class="navbar-brand" href="{{route('home')}}">Main page</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link waves-effect waves-light" href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> Login</a></li>
                        <li class="nav-item"><a class="nav-link waves-effect waves-light" href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="#" class="dropdown-item waves-effect waves-light"><i class="fas fa-list-ul"></i> View cart</a>
                                <a href="#" class="dropdown-item waves-effect waves-light"><i class="far fa-credit-card"></i> Go to checkout</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle mr-1" src="{{Auth::user()->avatar_url}}" alt="" style="max-width:30px">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="{{route('admin.home')}}" class="dropdown-item waves-effect waves-light"><i class="fas fa-lock"></i> Admin dashboard</a>
                                <a href="{{route('order.index')}}" class="dropdown-item waves-effect waves-light"><i class="fas fa-list-ul"></i> My orders</a>
                                <a href="#" class="dropdown-item waves-effect waves-light"><i class="fas fa-cogs"></i> Settings</a>
                                <a class="dropdown-item waves-effect waves-light" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Log out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-3 offset-xl-1 mb-sm-4">
                    <div class="card w-100">
                        <div class="card-header">Menu</div>
                        <div class="card-body sidenav-list">
                            <div class="widget-wrapper w-100">
                                <div class="list-group">
                                    <a href="{{route('admin.home')}}" class="list-group-item waves-effect {{ Nav::isRoute('admin.home') }}">Home</a>
                                    <a href="{{route('admin.product.index')}}" class="list-group-item waves-effect {{ Nav::isResource('products', '/admin') }}" ><i class="fas fa-shopping-basket"></i> Product management</a>
                                    <a href="{{route('admin.category.index')}}" class="list-group-item waves-effect {{ Nav::isResource('categories', '/admin') }}" ><i class="fas fa-list-ul"></i> Category management</a>
                                    <a href="{{route('contact.index')}}" class="list-group-item waves-effect {{ Nav::isResource('contacts', '/admin') }}" ><i class="fas fa-envelope"></i> Contact form messages</a>
                                    <a href="{{route('admin.chart.index')}}" class="list-group-item waves-effect {{ Nav::isResource('charts', '/admin') }}"><i class="fas fa-chart-pie"></i> Statistics</a>
                                    <a href="{{route('admin.report.index')}}" class="list-group-item waves-effect {{ Nav::isResource('reports', '/admin') }}"><i class="fas fa-chart-bar"></i> Reports</a>
                                    <a href="#" class="list-group-item waves-effect "><i class="fas fa-cogs"></i> General settings</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>

    </main>
</div>
<!-- Scripts -->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/mdb.min.js')}}"></script>
<script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')

</body>
</html>
