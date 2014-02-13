@extends('defaults.layouts.index')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> All Your People
    </h1>
    <p class="lead">
        Just look at the - sitting there all shiny and proud... (And the best bit? They're all yours!)
    </p>
@stop

@section('actions-list')
    <li><a href="{{ route('contacts.create') }}"><p><em>Create new contact</em></p></a></li>
@stop

@section('table')
    <table class="table dataTable data-table" id="contacts_table" data-sAjaxSource="/ajax/contacts?cols=id,first_name,last_name">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

@stop

@section('below-table')
    <div>
        <a href="contacts/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New contact</a>
    </div>
@stop