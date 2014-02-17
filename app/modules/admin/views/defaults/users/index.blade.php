@extends('layouts.index')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> All Your Users
    </h1>
    <p class="lead">
        All these people have access to your Dashboard
    </p>
@stop

@section('actions-list')
    <li><a href="{{ route('app.users.create') }}"><p><em>Create new User</em></p></a></li>
@stop

@section('table')
    <div class="table-responsive clearfix">
        <table class="table dataTable data-table" id="users_table" data-ajaxsource="/api/users?cols=id,first_name,last_name,email" data-showid="false" data-linkurl="users" data-iDisplayLength="5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@stop

@section('below-table')
    <div class="row">
        <a href="/app/users/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New User</a>
    </div>
@stop