@extends('layouts.create')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> Create a C
    </h1>
    <p class="lead">
        Add the basic details (more options on the next page).
    </p>
@stop

@section('col1')
    <div class="well"><!-- Well -->
        <h4 class="text-primary1"><i class="fa fa-pencil"></i> What's your new friend's name...?</h4>
        <h1>this view is wrong - madd in Fprmer lie in /edit.blade.php</h1>
        {{ Form::open(array('route' => 'app.actions.store'), array('role' => 'form', 'class' => 'myClass')) }}

            <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
                {{ Former::text('action_name')->class('form-control input-lg')->placeholder('E.g. Lionel') }}
                <span class="help-block">{{ $errors->first('action_name', '<p class="bg-danger">:message</p>') }}</span>
            </div>

            <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
                {{ Former::text('action_type')->class('form-control input-lg')->placeholder('E.g. Blair') }}
                <span class="help-block">{{ $errors->first('action_type', '<p class="text-danger"><i class="fa fa-warning"></i> :message</p>') }}</span>
            </div>

            
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
            </div>
            
        {{ Form::close() }}

        <div class="form-group ">
            <p class="help-block"><strong>Got more to say?</strong> Don't worry, there's space on the next page for all that</p>
        </div>
    </div><!-- /Well -->
@stop


