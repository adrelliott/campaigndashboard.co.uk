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
    
    {{ Former::open()
    ->role('Form')
    ->class('ajax-form')
    ->ajaxMethod('PUT')
    ->method('PUT')
    ->route('api.v1.contacts.update', $record->id)
    ->populate($record->resource);
    
    }}

    @section('overview-form')

        <div class="col-lg-4 col-md-5 col-sm-4  col-xs-12">
            {{ Former::select('title')->class('form-control ')->options($config['titles'])->formGroup('col-lg-12') }}
        </div>
        
        <div class="col-lg-8 col-md-7 col-sm-8  col-xs-12">
            {{ Former::text('first_name')->class('form-control')->placeholder('E.g. Lionel') }}
        </div>
        
        <div class="col-lg-7 col-md-7 col-sm-12  col-xs-12">
            {{ Former::text('last_name')->class('form-control ')->placeholder('E.g. Blair') }}
        </div>

        <div class="col-lg-5 col-md-5 col-sm-12  col-xs-12">
            {{ Former::text('nickname')->class('form-control ')->placeholder('E.g. Blair')->label('Known As') }}
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-12  col-xs-12">
            {{ Former::text('legacy_id')->class('form-control ')->placeholder('Not a member')->label('Memb No')->disabled() }}
        </div>

        <div class="col-lg-8 col-md-8 col-sm-12  col-xs-12">
            {{ Former::text('email')->class('form-control ')->placeholder('E.g. Blair') }}
        </div>

    @show

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>

@stop

@section('inDepth')
    <h3 class="text-primary"><i class="fa fa-folder-open"></i> In-Depth</h3>
    
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 form-inline">
            {{ Former::radios('gender')
                  ->radios(array(
                  ' <i class="fa fa-male "></i> Male  ' => array('name' => 'gender', 'value' => 'male'),
                  ' <i class="fa fa-female "></i> Female  ' => array('name' => 'gender', 'value' => 'female')
                  ))->label(false) }}
        </div>

    @section('indepth-form-1')
        
    @show

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>
@stop
