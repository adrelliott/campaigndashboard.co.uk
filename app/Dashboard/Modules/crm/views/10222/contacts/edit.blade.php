@extends('crm::defaults.contacts.edit')

@section('overview-form')
    <h1>10222 form overview</h1>
    <div class="col-lg-4 col-md-5 col-sm-4  col-xs-12">
        <div class="form-group">
            <label for="nickname" class="control-label">Known As</label>
            {{ Former::select('title')->class('form-control ')->options($config['titles']) }}
        </div>
    </div>

    <div class="col-lg-8 col-md-7 col-sm-8  col-xs-12">
        <div class="form-group">
            <label for="nickname" class="control-label">Known As</label>
            {{ Former::text('first_name')->class('form-control')->placeholder('E.g. Lionel') }}
        </div>
    </div>

    <div class="col-lg-7 col-md-7 col-sm-12  col-xs-12">
        <div class="form-group">
            <label for="nickname" class="control-label">Known As</label>
            {{ Former::text('last_name')->class('form-control ')->placeholder('E.g. Blair') }}
        </div>
    </div>

    <div class="col-lg-5 col-md-5 col-sm-12  col-xs-12">
        <div class="form-group">
            <label for="nickname" class="control-label">Known As</label>
            {{ Former::text('nickname')->class('form-control ')->placeholder('E.g. Blair') }}
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12  col-xs-12">
        <div class="form-group">
            <label for="nickname" class="control-label">Known As</label>
            {{ Former::text('legacy_id')->class('form-control ')->placeholder('Not a member')->disabled() }}
        </div>
    </div>

    <div class="col-lg-8 col-md-8 col-sm-12  col-xs-12">
        <div class="form-group">
            <label for="nickname" class="control-label">Known As</label>
            {{ Former::text('email')->class('form-control ')->placeholder('E.g. Blair') }}
        </div>
    </div>


@stop