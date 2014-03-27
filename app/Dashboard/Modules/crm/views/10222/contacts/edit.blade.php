@extends('crm::defaults.contacts.edit')

@section('overview_form')

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

@stop