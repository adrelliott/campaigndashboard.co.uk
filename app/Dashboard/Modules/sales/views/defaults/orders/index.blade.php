@extends('layouts.index')

@section('page-title')
    <h1>
        <i class="fa fa-XXXX"></i> All Your Orders
    </h1>
    <p class="lead">
        Where <em>has</em> all the money gone, eh?
    </p>
@stop

@section('actions-list')
    <li><a href="{{ route('app.orders.create') }}"><p><em>Create new Order</em></p></a></li>
@stop

@section('table')
    <div class="table-responsive clearfix">
        <table class="table dataTable data-table" id="orders_table" data-ajaxsource="/api/orders?cols=id" data-showid="false" data-linkurl="orders" data-iDisplayLength="5">
            <thead>
                <tr>
                    <th>Id</th>
                    
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

@stop

@section('below-table')
    <div class="row">
        <a href="orders/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New Order</a>
    </div>
@stop