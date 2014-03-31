@extends('layouts.modal')

@section('modal-body')
    <h4 class="text-primary1"><i class="fa fa-pencil"></i> What do you want to say, {{ $current_user->first_name }}?</h4>
            
    {{ Former::open()
    ->role('Form')
    ->class('modal-ajax-form')
    ->tableId('notes')
    ->method('POST')
    ->ajaxMethod('POST')
    ->route('app.notes.store');
    // ->populate($record->resource);

    }}

    @section('content-form')

        <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('note_title')->class('form-control input')->placeholder('E.g. Phone call')->label('Note Title') }}
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::textarea('note_body')->class('form-control input')->placeholder('E.g. They wanted to know where their order was. I told them it had been dispatched.')->rows(5) }}
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
