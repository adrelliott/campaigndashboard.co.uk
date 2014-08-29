@extends('me::layouts.client')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Welcome to TODO - Owner Name Here</h1>
        <p>Hello, and welcome to the TODO client login area, where you can access your account information and keep us up-to-date. Please login below with the email and password generated for you by one of our team.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="account-wall">
            <div>
                @include('partials.common._message')
            </div>
            
            {{ Form::open(array( 'route' => 'me.contact_login', 'class' => 'form-signin' )) }}

                <p>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email address" required autofocus>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </p>

                <p>
                    <button class="btn btn-primary pull-left" type="submit">Sign in</button>
                    <label class="checkbox pull-left">
                        <input type="checkbox" name="remember" value="1">
                        Remember me
                    </label>
                </p>

                <!-- <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span> -->

            {{ Form::close() }}

            <br clear="both" />
            <br clear="both" />
            <br clear="both" />

            <p><a href="{{ URL::route('me.reset') }}">Forgot your password?</a></p>

        </div>
    </div>
</div>
@stop