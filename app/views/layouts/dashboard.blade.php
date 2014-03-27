@extends('layouts.app')

@section('top-line')
    <h1>
        <i class="fa fa-dashboard"></i> Welcome to the {{ $current_user->company }} Dashboard
    </h1>
    <p class="lead">
        Need help? Call 0161 883 2244
    </p>
    <div class="col-lg-8 col-md-6 col-sm-7 col-xs-12"><!-- col-1 -->
        <div class="jumbotron">
            @section('jumbotron')
                // Set in modules/dashboard/defaults/dashboard.blade.php
            @show
        </div>    
    </div><!-- /col-1 -->

    <div class="col-lg-4 col-md-6 col-sm-5 col-xs-12"><!-- col-2 -->
        <div class="well well-lg">
            @section('well')
                // Set in modules/dashboard/defaults/dashboard.blade.php
            @show
        </div>    
    </div><!-- /col-2 -->
    
@stop

@section('content')
    <hr>
    <!-- Pills -->
        @if (isset($config[$controller . 'index']['tables']))
            @include('partials.app._tab-header', array('tabs' => $config[$controller . 'index']['tables']))
            @include('partials.app._tab-body', array('tabs' => $config[$controller . 'index']['tables']))
        @endif
    <!-- /Pills -->
    {{-- Set in modules/dashboard/defaults/dashboard.blade.php --}}
@stop