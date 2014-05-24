@extends('layouts.modal')

@section('modal-body')
    <h4 class="text-primary1"><i class="fa fa-pencil"></i> Note locked for editing</h4>
            
    {{ Former::open()
    ->role('Form')
    ->id('note')
    ->populate($record->resource);

    }}



    @section('content-form')
        
        <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('note_title')->class('form-control input')->placeholder('A note title wasn\'t included...')->label('Note Title')->disabled() }}
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::textarea('note_body')->class('form-control input')->placeholder('That\'s all we know. No more info was given.')->rows(5)->disabled() }}
        </div>

    @show

    {{ Former::close() }}
    <div class="form-group ">
        <p class="help-block"><strong>Just so you know...</strong> you cannot edit a note after you have made it</p>
    </div>
@stop
