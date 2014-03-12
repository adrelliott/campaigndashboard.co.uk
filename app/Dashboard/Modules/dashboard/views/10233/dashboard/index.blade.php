@extends('layouts.index')

@section('top-line')
    <h1>
        <i class="fa fa-dashboard"></i> 1Welcome to the {{ $current_user_new->company }} Dashboard
    </h1>
    <p class="lead">
        Need help? Call 0161 883 2244
    </p>
    <div class="col-lg-8 col-md-6 col-sm-7 col-xs-12"><!-- col-1 -->
        <div class="jumbotron">
            <h1>Hello, {{ $current_user->first_name }}!</h1>
            <p>Use the menus on the top to find your way around.</p>
            <div class="row">
                <p><a href="contacts/create" class="btn btn-primary btn-lg pull-right" role="button"><i class="fa fa-plus"></i>  Create new {{ $config['contacts']['label'] }}</a></p>
            </div>
        </div>    
    </div><!-- /col-1 -->

    <div class="col-lg-4 col-md-6 col-sm-5 col-xs-12"><!-- col-2 -->
        <div class="well well-lg">
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge">494</span>
                    Total Number of Contacts
                </li>
                <li class="list-group-item">
                    <span class="badge">494</span>
                    Total Number Opted-into Newsletter
                </li>
                <li class="list-group-item">
                    <span class="badge">49</span>
                    Total Number of Emails Sent
                </li>
                <li class="list-group-item">
                    <span class="badge">142</span>
                    <span class="label label-info">Suspect</span>
                    Total Number of Suspects
                </li>
                <li class="list-group-item">
                    <span class="badge">65</span>
                    <span class="label label-primary">Prospects</span>
                    Total Number of Prospects
                </li>
                <li class="list-group-item">
                    <span class="badge">34</span>
                    <span class="label label-success">Clients</span>
                    Total Number of Clients
                </li>
            </ul>
            
        </div>    
    </div><!-- /col-2 -->
    
@stop


@section('table')
    <hr>
    <h1>
        <i class="fa fa-user"></i> Your {{ $config['contacts']['label'] }}s
    </h1>
    <div class="table-responsive clearfix">
        <table class="table dataTable data-table" id="contacts_table" data-ajaxsource="/api/contacts?cols=id,first_name,last_name,postcode,email,mobile_phone" data-showid="false" data-linkurl="contacts" data-iDisplayLength="5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Postcode</th>
                    <th>Email</th>
                    <th>Mobile</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

@stop

@section('below-table')
    <div class="row">
        <a href="contacts/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New {{ $config['contacts']['label'] }}</a>
    </div>
@stop