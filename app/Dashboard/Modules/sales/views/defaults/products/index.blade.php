@extends('layouts.index')

@section('page-title')
    <h1>
        <i class="fa fa-XXXX"></i> All Your products
    </h1>
    <p class="lead">
        Where <em>has</em> all the money gone, eh?
    </p>
@stop

@section('actions-list')
    <li><a href="{{ route('app.products.create') }}"><p><em>Create new Order</em></p></a></li>
@stop

@section('table')
    <div class="table-responsive clearfix">
        <table class="table dataTable data-table" id="products_table" data-ajaxsource="/api/products?cols=id" data-showid="false" data-linkurl="products" data-iDisplayLength="5">
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
        <a href="products/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New Order</a>
    </div>
@stop