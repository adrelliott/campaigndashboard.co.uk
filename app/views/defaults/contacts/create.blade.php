@extends('defaults.layouts.create')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> Create a Contact
    </h1>
    <p class="lead">
        Add the basic details (more options on the next page).
    </p>
@stop

@section('col1')
    <div class="well"><!-- Well -->
        <h4 class="text-primary1"><i class="fa fa-pencil"></i> What's your new friend's name...?</h4>
        {{ Form::open(array('route' => 'contacts.store'), array('role' => 'form', 'class' => 'myClass')) }}

            <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
                {{ Former::text('first_name')->class('form-control input-lg')->placeholder('E.g. Lionel') }}
                <span class="help-block">{{ $errors->first('first_name', '<p class="bg-danger">:message</p>') }}</span>
            </div>

            <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
                {{ Former::text('last_name')->class('form-control input-lg')->placeholder('E.g. Blair') }}
                <span class="help-block">{{ $errors->first('last_name', '<p class="text-danger"><i class="fa fa-warning"></i> :message</p>') }}</span>
            </div>

            <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
                {{ Former::text('email')->class('form-control input-lg')->placeholder('E.g. Lionel@GiveUsAClue.com') }}
                <span class="help-block">{{ $errors->first('email', '<p class="text-danger"><i class="fa fa-warning"></i> :message</p>') }}</span>
            </div>

            <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
                {{ Former::text('mobile')->class('form-control input-lg')->placeholder('E.g. 07707 565656') }}
                <span class="help-block">{{ $errors->first('mobile', '<p class="text-danger"><i class="fa fa-warning"></i> :message</p>') }}</span>
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


