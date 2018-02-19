@extends('layouts.admin')

@section('content')
    <!--Panel-->
    <div class="card card-default w-100">
        <div class="card-header white-text">
            Products
        </div>
        <div class="card-body">
            <a href="{{route('product.create')}}" class="btn btn-outline-success waves-effect float-right"><i class="fas fa-plus"></i> Add product</a>
            <div class="dataTables_wrapper">
                <table id="productList" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>

                    </tr>
                    </tfoot>
                    <tbody>
                    <tr>
                        <td>Name </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/.Panel-->
@endsection