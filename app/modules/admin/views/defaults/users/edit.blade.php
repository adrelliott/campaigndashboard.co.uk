@extends('layouts.show')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> This is yerman4
    </h1>
    <p class="lead">
        He likes beets
    </p>
@stop 

@section('actions-list')
    <li><a href="{{ route('app.users.create') }}"><p><em>Create new user</em></p></a></li>
@stop

@section('details')
    <h3 class="text-primary"><i class="fa fa-info-circle"></i> Overview</h3>
    {{ Former::open()
        ->role('Form')
        ->class('form-inline')
        ->method('PUT')
        ->route('app.users.update', $record->id)
        ->populate($record);
    }}

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('first_name')->class('form-control input-lg')->placeholder('E.g. Lionel') }}
        </div>

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('last_name')->class('form-control input-lg')->placeholder('E.g. Blair') }}
        </div>
        
        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('company')->class('form-control input-lg')->placeholder('E.g. TheGreatestCompany Ltd')->label('Organisation name') }}
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>
        
    {{ Former::close() }}
        

@stop

@section('permissions')
    <h3 class="text-primary"><i class="fa fa-folder-open"></i> In-Depth</h3>
        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{-- Former::text('email')->class('form-control input-lg')->placeholder('E.g. Lionel@GiveUsAClue.com') --}}
        </div>

@stop



@section('password')
    <p>You can change your password here</p>
    <p>Just make sure that you choose a strong passowrd, you retype it etc</p>
    <div class="clearfix">

        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
            {{-- Former::password('password')->class('form-control input-lg')->placeholder('Leave this blank to keep the same password') --}}
        </div>
        <div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
        {{-- Former::password('_password_confirmation')->class('form-control input-lg')->placeholder('If you are changing your password, retype it here') --}}
    </div>

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
    </div>
    </div>
    <div class="well well-sm">
        <h3>Looking for something, {{ $user->first_name}} ?</h3>
        <p>You see slightly different screens, depending on your admin level.</p>
        <p>If you need to change what you see here, just get in touch with us (0161 883 22 44)</p>
    </div>
@stop

@section('modal')
    @include('partials.common._modal', array('modalTitle' => 'NAE FROM show view'))
@stop

