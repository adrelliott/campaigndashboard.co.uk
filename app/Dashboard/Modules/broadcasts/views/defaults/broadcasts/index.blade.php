@extends('layouts.index')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> All Your Broadcasts
    </h1>
    <p class="lead">
        Make some noise!
    </p>
@stop



@section('actions-list')
    <li><a href="{{ route('app.broadcasts.create') }}"><p><em>Create new Broadcast</em></p></a></li>
@stop

@section('table')
    <div class="table-responsive clearfix">
        {{ getTable('broadcasts_index', $config) }}
    </div>
@stop

@section('below-table')
    <div class="row">
        <a href="broadcasts/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New Broadcast</a>
    </div>
@stop

