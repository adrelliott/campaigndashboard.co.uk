@extends('layouts.modal')

@section('modal-body')
<h4 class="text-primary1"><i class="fa fa-pencil"></i> Once a note has been created, you cannot edit or delete it</h4>
        
{{ Former::open()
->role('Form')
->id('note')
->populate($record->resource);

}}
    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
        {{ Former::text('note_name')->class('form-control input')->placeholder('E.g. Fan called')->label('Note Title')->disabled() }}
    </div>

    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
        {{ Former::textarea('note_body')->class('form-control input')->placeholder('E.g. They wanted to know when the next match was')->rows(5)->disabled() }}
    </div>
    <input type="hidden" class="" name="user_id" value="{{ $user->id }}"> 

{{ Former::close() }}
@stop
