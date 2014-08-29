@extends('layouts.index') 

@section('page-title')
    <h1>
        <i class="fa fa-search"></i> Search Results
    </h1>
    <p class="lead">
        Because who wants to dig around data tables?
    </p>
@stop

@section('actions-list')
    
@stop

@section('table')
    <div class="table-responsive clearfix">
        {{ getTable( 'contacts_search', $config, FALSE, FALSE, $results ) }}
    </div>
@stop