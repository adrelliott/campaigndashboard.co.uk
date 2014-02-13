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
    <li><a href="{{ route('contacts.create') }}"><p><em>Create new contact</em></p></a></li>
@stop

@section('overview')
    <h3 class="text-primary"><i class="fa fa-info-circle"></i> Overview</h3>
    {{ Form::open(array('role' => 'form', 'class' => 'myClass', 'route' => array('contacts.update', $contact->id), 'method' => 'put')) }}

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('first_name')->value($contact->first_name)->class('form-control input-lg')->placeholder('E.g. Lionel') }}
            <span class="help-block">{{ $errors->first('first_name', '<p class="bg-danger">:message</p>') }}</span>
        </div>

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('last_name')->value($contact->last_name)->class('form-control input-lg')->placeholder('E.g. Blair') }}
            <span class="help-block">{{ $errors->first('last_name', '<p class="text-danger"><i class="fa fa-warning"></i> :message</p>') }}</span>
        </div>

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('email')->value($contact->email)->class('form-control input-lg')->placeholder('E.g. Lionel@GiveUsAClue.com') }}
            <span class="help-block">{{ $errors->first('last_name', '<p class="text-danger"><i class="fa fa-warning"></i> :message</p>') }}</span>
        </div>

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('mobile')->value($contact->mobile)->class('form-control input-lg')->placeholder('E.g. 07707 565656') }}
            <span class="help-block">{{ $errors->first('last_name', '<p class="text-danger"><i class="fa fa-warning"></i> :message</p>') }}</span>
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>
        
    {{ Form::close() }}
@stop







@section('inDepth')
    
    
@stop

@section('optIn')
    <h3 class="text-primary"><i class="fa fa-lock"></i> Opt Ins</h3>
@stop

@section('notes')
    <h3 class="text-primary"><i class="fa fa-book"></i> Notes</h3>

@stop


@section('tasks')
    <h3 class="text-primary"><i class="fa fa-info-circle"></i> Overview</h3>
    {{ Form::open(array('role' => 'form', 'class' => 'myClass', 'route' => array('contacts.update', $contact->id), 'method' => 'put')) }}

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('first_name')->value($contact->first_name)->class('form-control input-lg')->placeholder('E.g. Lionel') }}
            <span class="help-block">{{ $errors->first('first_name', '<p class="bg-danger">:message</p>') }}</span>
        </div>

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('last_name')->value($contact->last_name)->class('form-control input-lg')->placeholder('E.g. Blair') }}
            <span class="help-block">{{ $errors->first('last_name', '<p class="text-danger"><i class="fa fa-warning"></i> :message</p>') }}</span>
        </div>

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('email')->value($contact->email)->class('form-control input-lg')->placeholder('E.g. Lionel@GiveUsAClue.com') }}
            <span class="help-block">{{ $errors->first('last_name', '<p class="text-danger"><i class="fa fa-warning"></i> :message</p>') }}</span>
        </div>

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('mobile')->value($contact->mobile)->class('form-control input-lg')->placeholder('E.g. 07707 565656') }}
            <span class="help-block">{{ $errors->first('last_name', '<p class="text-danger"><i class="fa fa-warning"></i> :message</p>') }}</span>
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>
        
    {{ Form::close() }}

@stop

@section('modal')
    @include('defaults.partials._modal', array('modalTitle' => 'NAE FROM show view'))
@stop

