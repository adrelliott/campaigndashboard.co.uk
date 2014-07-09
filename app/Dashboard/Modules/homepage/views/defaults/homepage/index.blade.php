@extends('layouts.dashboard')

@section('jumbotron')
    <h1>Hello {{ $current_user->first_name }}!</h1>
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
            
    <div class="table-responsive clearfix">
        {{ getTable('homepage_contacts', $config) }}
    </div>

    <div class="row">
        <a href="/app/contacts/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New {{ $config['contacts']['label'] }}</a>
    </div>

@stop

@section('orders')
    <h1>
        <i class="fa fa-user"></i> Your {{ $config['orders']['label'] }}s 
    </h1>
            
    <div class="table-responsive clearfix">
        {{ getTable('homepage_contacts', $config) }}
    </div>

    <div class="row">
        <a href="/app/orders/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New {{ $config['orders']['label'] }}</a>
    </div> 
@stop