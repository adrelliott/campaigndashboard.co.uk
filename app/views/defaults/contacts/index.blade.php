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
    <li><a href="#"><p><em>Create new contact</em></p></a></li>
@stop

@section('table')
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
@stop

@section('below-table')
    <div>
        <a href="#" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New contact</a>
    </div>
@stop