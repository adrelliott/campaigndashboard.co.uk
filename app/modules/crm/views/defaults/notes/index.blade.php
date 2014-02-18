@extends('layouts.index')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> All Your Actions
    </h1>
    <p class="lead">
        Just look at the - sitting there all shiny and proud... (And the best bit? They're all yours!)
    </p>
@stop

@section('actions-list')
    <li><a href="{{ route('app.actions.create') }}"><p><em>Create new contact</em></p></a></li>
@stop

@section('table')
    <div class="table-responsive clearfix">
        <table class="table dataTable data-table" id="actions_table" data-ajaxsource="/api/actions?cols=id,action_name,action_type" data-showid="false" data-linkurl="actions" data-iDisplayLength="10">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Action name</th>
                    <th>Action Type</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

@stop

@section('below-table')
    <div class="row">
        <a href="actions/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New Action</a>
    </div>
@stop