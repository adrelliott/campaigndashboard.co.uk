@extends('layouts.site')

@section('page-title')
<h1><i class="fa fa-lock"></i> Log into your Dashboard</h1>
@stop 

@section('next-actions')
@stop

@section('content')
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
        <div class="account-wall">
            <div class="col-lg-10 col-lg-offset-1">
                @include('partials.common._message')
            </div>
            <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
            {{ Form::open(array('route' => 'app.sessions.store', 'class' => 'form-signin')) }}

                <input type="email" name="email" class="form-control" placeholder="Enter your email address" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" name="remember" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>

            {{ Form::close() }}

        </div>
        <h1 class="text-center login-title">Sorry - nothing personal, but Dashboard is <a href="#">invite only</a>.</h1>
    </div>
</div>
@stop



