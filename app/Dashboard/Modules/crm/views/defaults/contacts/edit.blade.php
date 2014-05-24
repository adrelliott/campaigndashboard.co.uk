@extends('layouts.show')


@section('page-title')
    <h1>
        <i class="fa fa-user"></i> {{ $record->fullName }}
    </h1>
    <p class="lead">
        You met each other <em>roughly</em> {{ $record->created_at }}.
    </p>
    
@stop 

@section('actions-list')
    <li><a href="{{ route('app.contacts.create') }}"><p><em>Create new {{ $config['contacts']['label'] }}</em></p></a></li>
@stop

@section('overview')
    <h3 class="text-primary"><i class="fa fa-info-circle"></i> Overview</h3>
   
    {{ Form::model(
        $record->resource,
        array(
            'route' => array('app.contacts.update', $record->id),
            'method' => 'PATCH',
            'role' => 'form',
            'class' => 'ajax-form',
            'ajax-url' => '/api/contacts/' . $record->id,
            'ajax-method' => 'PATCH',
        ))
    }}

        @foreach ($config['forms']['contacts']['edit_overview'] as $field => $attr)
            {{ Form::inputBS($field, $attr) }}
        @endforeach
    
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>

@stop

@section('inDepth')
    <h3 class="text-primary"><i class="fa fa-folder-open"></i> In-Depth</h3>
    
        @foreach ($config['forms']['contacts']['edit_indepth'] as $field => $attr)
            {{ Form::inputBS($field, $attr) }}
        @endforeach
    
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>

@stop

@section('optIn')
    <h3 class="text-primary"><i class="fa fa-lock"></i> Opt Ins</h3>
    
        @foreach ($config['forms']['contacts']['edit_optin'] as $field => $attr)
            {{ Form::inputBS($field, $attr) }}
        @endforeach
    
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>
        
    {{ Form::close() }}
@stop

@section('notes')
        <h3 class="text-primary"><i class="fa fa-book"></i> Notes1</h3>
        
        <div class="table-responsive clearfix">
            {{ getTable('notes_table', $config, array('id' => $record->id)) }}
        </div>

        <div class="pull-right margin_top_15" style="margin-top:10px">
            <a class="btn btn-primary open-modal " href="#" modal-source="{{URL::route('app.notes.create', array('contact_id' => $record->id)) }}" data-view="show_modal" >
                <i class="fa fa-plus"></i> Create New Note
            </a>
        </div>

@stop

@section('purchases')
    <h3 class="text-primary"><i class="fa fa-gbp"></i> Purchases</h3>
    
    @section('purchases-table')

        <div class="table-responsive clearfix">
            {{ getTable('purchases_table', $config, array('id' => $record->id)) }}
        </div>
    
        <div class="table-responsive clearfix">
            <table class="table dataTable data-table minitable" id="orders-table" 
            data-ajaxsource="/dt/orders/getFor?cols=id,order_title,order_date&sortDESC=updated_at&contact_id={{ $record->id}}"
             data-showid="true" data-linkurl="/app/orders" data-iDisplayLength="5" data-linkclass="open-modal" data-modalsource="/app/orders" >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Order Name</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    @show
    
    <a class="btn btn-primary pull-right open-modal" href="#" modal-source="{{ URL::route('app.orders.create', array('contact_id' => $record->id)) }}" data-view="show_modal" ><i class="fa fa-plus"></i> Create New Order</a>
@stop

@section('roles')
    <h3 class="text-primary"><i class="fa fa-group"></i> Roles</h3>

    @section('roles-table')

        <div class="table-responsive clearfix">
            {{ getTable('roles_table', $config, array('id' => $record->id)) }}
        </div>

        <div class="table-responsive clearfix">
            <table class="table dataTablexxxxxxxxx data-tableXXXXXXXX minitable" id="roles-table" 
            data-ajaxsource="/dt/roles?cols=id,role_title,role_variant&sortDESC=role_variant&contact_id={{ $record->id}}"
             data-showid="false" data-linkurl="/app/roles" data-iDisplayLength="5" data-linkclass="open-modal" data-modalsource="/app/roles" >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Role Name</th>
                        <th>Season</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    @show
    
    <a class="btn btn-primary pull-right open-modal" href="#" modal-source="{{ URL::route('app.roles.create', array('contact_id' => $record->id)) }}" data-view="show_modal" ><i class="fa fa-plus"></i> Create New Role</a>
@stop

@section('tags')
    <h3 class="text-primary"><i class="fa fa-tags"></i> Tags</h3>

    @section('tags-table')

        <div class="table-responsive clearfix">
            {{ getTable('tags_table', $config, array('id' => $record->id)) }}
        </div>
<div class="table-responsive clearfix">
            <table class="table dataTable data-table minitable" id="tags-table" 
            data-ajaxsource="/dt/tags?cols=id,tag_title&sortDESC=id&contact_id={{ $record->id}}"
             data-showid="false" data-linkurl="/app/tags" data-iDisplayLength="5" data-linkclass="open-modal" data-modalsource="/app/tags" >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tag Name</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        
    @show

@stop

@section('modal')
    @include('partials.common._modal', array('modalTitle' => $record->fullName))
@stop

