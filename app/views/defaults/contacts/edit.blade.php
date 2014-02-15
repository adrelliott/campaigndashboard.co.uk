@extends('defaults.layouts.show')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> This is yerman
    </h1>
    <p class="lead">
        He likes beets
    </p>
@stop 

@section('actions-list')
    <li><a href="{{ route('crm.contacts.create') }}"><p><em>Create new contact</em></p></a></li>
@stop

@section('overview')
    <h3 class="text-primary"><i class="fa fa-info-circle"></i> Overview</h3>
    {{ Former::open()
        ->role('Form')
        ->class('form-inline')
        ->method('PUT')
        ->route('crm.contacts.update', $contact->id)
        ->populate($contact);
        
    }}

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('first_name')->class('form-control input-lg')->placeholder('E.g. Lionel') }}
        </div>

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('last_name')->class('form-control input-lg')->placeholder('E.g. Blair') }}
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>
@stop

@section('inDepth')
    <h3 class="text-primary"><i class="fa fa-folder-open"></i> In-Depth</h3>
        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('email')->class('form-control input-lg')->placeholder('E.g. Lionel@GiveUsAClue.com') }}
        </div>

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('mobile')->class('form-control input-lg')->placeholder('E.g. 07707 565656') }}
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>
        
    {{ Former::close() }}
@stop

@section('optIn')
    <h3 class="text-primary"><i class="fa fa-lock"></i> Opt Ins</h3>
@stop

@section('notes')
    <h3 class="text-primary"><i class="fa fa-book"></i> Notes</h3>

@stop


@section('tasks')
    <h3 class="text-primary"><i class="fa fa-info-circle"></i> Overview</h3>


@stop

@section('modal')
    @include('defaults.partials._modal', array('modalTitle' => 'NAE FROM show view'))
@stop

