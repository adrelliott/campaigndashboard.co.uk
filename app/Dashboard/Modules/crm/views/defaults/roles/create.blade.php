@extends('layouts.modal')

@section('modal-body')
    <h4 class="text-primary1"><i class="fa fa-pencil"></i> Add a new role here</h4>
            
    {{Former::open()
        ->role('Form')
        ->class('modal-ajax-form')
        ->tableId('roles')
        ->method('POST')
        ->ajaxMethod('POST')
        ->route('app.contacts.roles.store', $contact->id);
    }}


    @section('content-form')
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::select('role_id')->class('form-control input-lg')->options($roles) }}
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('season')->class('form-control input-lg')->placeholder('e.g. 2014/15') }}
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            {{ Former::date('start')->class('form-control input-lg') }}
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            {{ Former::date('end')->class('form-control input-lg') }}
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::textarea('notes')->class('form-control input-lg')->placeholder('Any extra notes')->rows(8) }}
        </div>
    @show
    
        <input type="hidden" class="" name="contact_id" value="{{ $contact->id }}">

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Save</button>
        </div>   

    {{ Former::close() }}

    <div class="form-group ">
        <p class="help-block"><strong>Just so you know...</strong> your name & the time/date will be auto-stamped on this note.</p>
    </div>
@stop