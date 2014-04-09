@extends('layouts.index') 

<?php 
    // Sets up the table (ensure ot add as an index of the variable $dataTables)
    $dataTables['index'] = Datatable::table()       // these are the column headings to be shown  
    ->setUrl(URL::to($config['tables']['contacts_index']['url']))
    ->addColumn($config['tables']['contacts_index']['showCols'])
    ->setOptions($config['tables']['contacts_index']['options'])
    ->setCustomValues(array('link-to-record' => '/app/contacts'))
    ->noScript();

?> 

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
    {{ $dataTables['index']->render('partials.app._table') }}
</div>

@stop


@section('below-table')
    <div class="row">
        <a href="/app/contacts/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New {{ $config['contacts']['label'] }}</a>
    </div>
@stop