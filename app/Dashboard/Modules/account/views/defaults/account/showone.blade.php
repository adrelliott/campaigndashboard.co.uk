@extends('layouts.app')

@section('page-title')
    <h1><i class="fa fa-cogs"></i> Account Settings</h1>
    <p class="lead">Update your profile, email address and password</p>
@stop

@section('content')
        
        <div class="row">
            <div class="col-md-6">
                <h2>Profile</h2>
            </div>

            <div class="col-md-6">
                {{ Former::open()
                    ->route('app.account.updateOne')
                    ->method('PATCH')
                    ->populate($record) }}
                    
                    <h2>Change Email</h2>
                    {{ Former::text('email')->label(FALSE) }}
                    {{ Former::large_primary_submit('Save') }}

                {{ Former::close() }}
            </div>
        </div>

@stop