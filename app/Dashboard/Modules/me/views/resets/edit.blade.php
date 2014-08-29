@extends('me::layouts.client')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Reset Your Password</h1>
        <p>Please enter your new password below to reset your password.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="account-wall">
            <div>
                @include('partials.common._message')
            </div>
             
            {{ Form::open(array('route' => array('me.reset.form', $token))) }}
                {{ Form::hidden('email', $email) }}
                {{ Form::hidden('token', $token) }}

                <p>{{ Form::password('password', array( 'class' => 'form-control', 'placeholder' => 'Password' )) }}</p>
                <p>{{ Form::password('password_confirmation', array( 'class' => 'form-control', 'placeholder' => 'Confirm Password' )) }}</p>
                             
                <p>{{ Form::submit('Save', array( 'class' => 'btn btn-primary' )) }}</p>
            {{ Form::close() }}


        </div>
    </div>
</div>
@stop