@extends('layouts.show')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> {{ $model->fullName }}
    </h1>
    <p class="lead">
        You met each other <em>roughly</em> {{ $model->created_at }}.
    </p>
    
@stop 

@section('actions-list')
    <li><a href="{{ route('app.contacts.create') }}"><p><em>Create new {{ $config['contacts']['label'] }}</em></p></a></li>
@stop

@section('overview')
    <h3 class="text-primary"><i class="fa fa-info-circle"></i> Overview</h3>

    {{ Former::open()
            ->role('Form')
            ->class('ajax-form')
            ->method('PATCH')
            ->ajaxUrl('/api/contacts/' . $model->id)
            ->ajaxMethod('PATCH')
            ->rules(array('name' => 'required|max:20|alpha'))
            ->action('app/contacts/' . $model->id)
            ->populate($model->resource)
    }}

        <div class="col-lg-4 col-md-4 col-sm-4  col-xs-12">
            {{ Former::select('title')->class('form-control input-lg')->options($config['dropdowns']['titles']) }}
        </div>

        <div class="col-lg-8 col-md-8 col-sm-8  col-xs-12">
            {{ Former::text('first_name')->class('form-control input-lg')->placeholder('E.g. Lionel')->id('copy-source') }}
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('last_name')->class('form-control input-lg')->placeholder('E.g. Blair') }}
        </div>

       <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('nickname')->class('form-control input-lg copy-destination')->placeholder('E.g. Dancing Li')->label('Known As') }}
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
            {{ Former::tel('mobile_phone')->class('form-control input-lg')->placeholder('E.g. 07703545343') }}
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
            {{ Former::tel('home_phone')->class('form-control input-lg')->placeholder('E.g. 01614536464') }}
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::email('email')->class('form-control input-lg')->placeholder('E.g. lionel@GiveUsAClue.com') }}
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Create this {{ $config['contacts']['label'] }}</button>
        </div>   

    {{ Former::close() }}
        
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
            {{ getTable('notes_table', $config, array('id' => $model->id)) }}
        </div>

        <div class="pull-right margin_top_15" style="margin-top:10px">
            <a class="btn btn-primary open-modal " href="#" modal-source="{{URL::route('app.notes.create', array('contact_id' => $model->id)) }}" data-view="show_modal" >
                <i class="fa fa-plus"></i> Create New Note
            </a>
        </div>

@stop

@section('purchases')
    <h3 class="text-primary"><i class="fa fa-gbp"></i> Purchases</h3>
   

        <div class="table-responsive clearfix">
            {{-- getTable('purchases_table', $config, array('id' => $model->id)) --}}
        </div>
  
    
    <a class="btn btn-primary pull-right open-modal" href="#" modal-source="{{ URL::route('app.orders.create', array('contact_id' => $model->id)) }}" data-view="show_modal" ><i class="fa fa-plus"></i> Create New Order</a>
@stop

@section('roles')
    <h3 class="text-primary"><i class="fa fa-group"></i> Roles</h3>

        <div class="table-responsive clearfix">
            {{ getTable('roles_table', $config, array('id' => $model->id)) }}
        </div>

        <div class="pull-right margin_top_15" style="margin-top:10px">
            <a class="btn btn-primary open-modal " href="#" modal-source="{{URL::route('app.roles.create', array('contact_id' => $model->id)) }}" data-view="show_modal" >
                <i class="fa fa-plus"></i> Create New Role
            </a>
        </div>
@stop

@section('tags')
    <h3 class="text-primary"><i class="fa fa-tags"></i> Tags</h3>

    @section('tags-table')


        
    @show

@stop

@section('modal')
    @include('partials.common._modal', array('modalTitle' => $model->fullName))
{{ dump($model)}}
@stop


