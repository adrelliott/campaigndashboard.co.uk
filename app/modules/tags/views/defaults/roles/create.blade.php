@extends('layouts.modal')

@section('modal-body')
    <h1>Create an Role</h1>
    <div class="row">  
        {{ Former::open()
        ->role('Form')
        ->class('ajax-form')
        ->id('')
        ->method('POST')
        ->ajaxMethod('POST')
        ->route('api.v1.contacts.storeTag', Input::get('contact_id'));
        // ->populate($record->resource);

        }}
            
            1. get all tags that are cateogy=role & dusplay as select
            2. when we save, just sync $contacts->tags->sync(1 => array('other' => 'info'))
            <input type="text" name="">



            <input type="hidden" class="" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" class="" name="contact_id" value="{{ Input::get('contact_id') }}">

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Save</button>
            </div>   

        {{ Former::close() }}
    </div>
    
@stop