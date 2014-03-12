@extends('layouts.index')

@section('page-title')
    <h1>
        <i class="fa fa-XXXX"></i> All Your Orderproducts
    </h1>
    <p class="lead">
        Where <em>has</em> all the money gone, eh?
    </p>
@stop

@section('actions-list')
    <li><a href="{{ route('app.orderproducts.create') }}"><p><em>Create new Order</em></p></a></li>
@stop

@section('table')
    <div class="table-responsive clearfix">
        <table class="table dataTable data-table" id="orderproducts_table" data-ajaxsource="/dt/orderproducts?cols=order_id AS id,id AS itemid,order_id,price,quantity,variant,contact_id" data-showid="false" data-linkurl="orderproducts" data-iDisplayLength="5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id</th>
                    <th>Order Id</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Variant</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

@stop

@section('below-table')
    <div class="row">
        <a href="orderproducts/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New Order</a>
    </div>
@stop