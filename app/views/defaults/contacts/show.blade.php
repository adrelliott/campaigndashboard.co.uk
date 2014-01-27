@extends('defaults.layouts.show')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> This is yerman
    </h1>
    <p class="lead">
        He likes beets
    </p>
@stop

@section('actions-list')
    <li><a><p><em>No Actions available</em></p></a></li>
@stop

<?php $leftTabs=['Overview', 'In Depth', 'Notes']; ?>

@section('overview')
    <legend>Other Details</legend>
    <div class="form-inline"><!-- .form-inline-->
        This is overview body
    </div>
@stop
@section('inDepth')
    This is In depth body
@stop
@section('notes')
    This is notes body
@stop

<!-- @ section('col1')
    <h6>This is the contacts/show.blade, col 1, xxxxxxx x x x x x x xxxx x xxxxxx   x x x x  x x x x  x x xxxxxxxxxx</h6>
    <ul>
        left to do:
        <li>Create the pill nav & body partials</li>
        <li>Create partials for the field types</li>
        <li>Create button partials (including delete record)</li>
        <li>test modal windows</li>
        <li>Set up method or filter to search for file in client folder firsatm then in default folder (as per Jamie Rumbelow's suggestion)</li>

    </ul>

@ stop -->

@section('col2')
    <h6>This is the contacts/show.blade, col 2, xxxxxxx x x x x x x xxxx x xxxxxx   x x x x  x x x x  x x xxxxxxxxxx</h6>
@stop

@section('modal')
    @include('defaults.partials._modal', array('modalTitle' => 'NAE FROM show view'))
@stop