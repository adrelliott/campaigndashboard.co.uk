@extends('crm::defaults.contacts.edit')

@section('overview-form')
    
    <div class="col-lg-4 col-md-5 col-sm-4  col-xs-12">
        <div class="form-group">
            <label for="nickname" class="control-label">Known As</label>
            {{ Former::select('title')->class('form-control ')->options($config['titles']) }}
        </div>
    </div>

    <div class="col-lg-8 col-md-7 col-sm-8  col-xs-12">
        {{ Form::textInput('first_name', array('placeholder' => 'E.g. Lionel')) }}
    </div>

    <div class="col-lg-7 col-md-7 col-sm-12  col-xs-12">
        {{ Form::textInput('last_name', array('placeholder' => 'E.g. Blair')) }}
    </div>

    <div class="col-lg-5 col-md-5 col-sm-12  col-xs-12">
        {{ Form::textInput('nickname', array('placeholder' => 'E.g. Large Li')) }}
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12  col-xs-12">
        {{ Form::textInput('legacy_id', array('placeholder' => '', 'extra' => 'disabled')) }}
    </div>

    <div class="col-lg-8 col-md-8 col-sm-12  col-xs-12">
        {{ Form::textInput('email', array('placeholder' => 'E.g. DancingLionel@hotmail.com')) }}
    </div>


@stop