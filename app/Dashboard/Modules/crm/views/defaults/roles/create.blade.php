@extends('layouts.modal')
{{ dump(Input::all(), 1)}}
{{ }}

@section('modal-body4')
    <h4 class="text-primary1"><i class="fa fa-pencil"></i> Add a new role here</h4>
            
    {{Former::open()
    ->role('Form')
    ->class('modal-ajax-form')
    ->tableId('notes')
    ->method('POST')
    ->ajaxMethod('POST')
    ->route('app.roles.store');
    // ->populate($record->resource);

    }}


    @section('content-form')
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::select('role_id')->class('form-control input-lg')->options($config['dropdowns']['roles']) }}
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::textarea('note_body')->class('form-control input-lg')->placeholder('E.g. Called to change their email address')->rows(8) }}
        </div>
    @show
    
        <input type="hidden" class="" name="user_id" value="{{ $current_user->id }}"> 
        <input type="hidden" class="" name="contact_id" value="{{ Input::get('contact_id') }}">

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Save</button>
        </div>   

    {{ Former::close() }}

    <div class="form-group ">
        <p class="help-block"><strong>Just so you know...</strong> your name & the time/date will be auto-stamped on this note.</p>
    </div>
@stop


@section('modal-body')
    <h1>Create an Role</h1>
    <div class="row">  
        {{ Former::open()
        ->role('Form')
        ->class('modal-ajax-form')
        ->id('')
        ->tableId('roles')
        ->method('POST')
        ->ajaxMethod('POST')
        ->route('app.roles.store');
        // ->populate($record->resource);

        }}

        @section('content-form')

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    {{ Former::select('role_title')->class('form-control input-sm')->label('Role')->options($config['roles']) }}
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    {{ Former::select('role_variant')->class('form-control input-sm')->options($config['seasons']) }}
                </div>
            </div>

            // Role title

            //start date

            //emd date

            season

            notes
            
        @show

            <input type="hidden" class="" name="contact_id" value="{{ Input::get('contact_id') }}">
            <input type="hidden" class="" name="user_id" value="{{ Auth::user()->user()->id }}">

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Save</button>
            </div>   

        {{ Former::close() }}
    </div>
    
@stop