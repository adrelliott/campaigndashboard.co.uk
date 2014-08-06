@extends('me::layouts.client')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Reset Your Password</h1>
        <p>Please enter your email address below, and we will send you an email with a link to reset your password.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="account-wall">
            <div>
                @include('partials.common._message')
            </div>
             
            {{ Form::open(array('route' => 'me.reset')) }}
             
              <p>{{ Form::text('email', Input::old('email'), array( 'class' => 'form-control', 'placeholder' => 'sexyperson@gmail.com' )) }}</p>
             
              <p>{{ Form::submit('Submit', array( 'class' => 'btn btn-primary' )) }}</p>
             
            {{ Form::close() }}


        </div>
    </div>
</div>
@stop