@extends('layouts.dashboard')

@section('jumbotron')
    <h1>Hello, {{ $current_user->first_name }}!</h1>
    <p>Use the menus on the top to find your way around.</p>
    <div class="row">
        <p><a href="contacts/create" class="btn btn-primary btn-lg pull-right" role="button"><i class="fa fa-plus"></i>  Create new {{ $config['contacts']['label'] }}</a></p>
    </div>
@stop

@section('well')
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge">6494</span>
            Total Number of Contacts
        </li>
        <li class="list-group-item">
            <span class="badge">4989</span>
            Total Number of Adult Contacts
        </li>
        <li class="list-group-item">
            <span class="badge">1492</span>
            Total Number of Junior Contacts
        </li>
        <li class="list-group-item">
            <span class="badge">2684</span>
            Number of Adult members
        </li>
        <li class="list-group-item">
            <span class="badge">440</span>
            Number of Junior members
        </li>
        <li class="list-group-item">
            <span class="badge">936</span>
            Number of Adult Season Tickets
        </li>
        <li class="list-group-item">
            <span class="badge">169</span>
            Number of Junior Season Tickets
        </li>
    </ul>
@stop

@section('contacts')
    <h1>
        <i class="fa fa-user"></i> Your {{ $config['contacts']['label'] }}s
    </h1>
        @section('contacts-table')
            
            <div class="table-responsive clearfix">
                <table class="table dataTable data-table" id="contacts_table"
                data-ajaxsource="/dt/contacts?cols=id,first_name,last_name,nickname,postcode,email,mobile_phone,legacy_id" data-showid="false" data-linkurl="/app/contacts" data-iDisplayLength="5">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Known As</th>
                            <th>Postcode</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Memb No</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        @show

    @section('below-contacts-table')

        <div class="row">
            <a href="/app/contacts/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New {{ $config['contacts']['label'] }}</a>
        </div>

    @stop

@stop

@section('orders')
    //this is orders
@stop