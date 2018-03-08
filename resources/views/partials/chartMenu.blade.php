<div class="col-md-3">
    <div class="card card-default w-100">
        <div class="card-header white-text">
            Charts
        </div>
        <div class="card-body sidenav-list">
            <div class="widget-wrapper w-100">
                <div class="list-group">
                    <a href="{{route('admin.chart.users')}}" class="list-group-item waves-effect {{ Nav::isResource('users', '/admin/charts') }}">User statistics</a>
                    <a href="{{route('admin.chart.products')}}" class="list-group-item waves-effect {{ Nav::isResource('products', '/admin/charts') }}">Product statistics</a>
                    <a href="{{route('admin.chart.sales')}}" class="list-group-item waves-effect {{ Nav::isResource('sales', '/admin/charts') }}">Sales statistics</a>
                </div>
            </div>
        </div>
    </div>
</div>