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
        <table class="table dataTable data-table" id="contacts_table" 
        data-ajaxsource="/api/v1/broadcasts?cols=id,broadcast_name,subject_line&datatables=true"
        data-showid="true" data-linkurl="/app/broadcasts" data-iDisplayLength="5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Broadcast Name</th>
                    <th>Subject Line</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

@stop

@section('below-table')
    <div class="row">
        <a href="broadcasts/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New Broadcast</a>
    </div>
@stop