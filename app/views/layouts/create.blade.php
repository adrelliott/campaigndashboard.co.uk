@extends('layouts.standard')

@section('page-title')
@stop

@section('content')
    <div class="row"><!-- Container for Columns -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><!-- Column 1 -->
            @section('col1')
                {{-- Usually its the create form that goes here --}}
            @show
        </div><!-- /Column 1-->
    </div><!-- / Container for Columns -->
@stop