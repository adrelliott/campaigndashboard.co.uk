@extends('layouts.index') 

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> All Your {{ $config['contacts']['label'] }}s
    </h1>
    <p class="lead">
        Just look at them - sitting there all shiny and proud... (And the best bit? They're all yours!)
    </p>
@stop

@section('actions-list')
    <li><a href="{{ route('app.contacts.create') }}"><p><em>Create new {{ $config['contacts']['label'] }}</em></p></a></li>
@stop


@section('table')
    <div class="table-responsive clearfix">
        {{ getTable('contacts_index', $config) }}
    </div>
@stop


@section('below-table')
    <div class="row">
        <a href="/app/contacts/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New {{ $config['contacts']['label'] }}</a>
    </div>
@stop