@extends('defaults.layouts.standard')

@section('content')
    
    <div class="row"><!-- Container for Columns -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><!-- Column 1-->
            @section('col1')
                <div class="well"><!-- Well -->
                    <!-- Pills -->
                    @include('defaults.partials._tab-header', array('tabs' => $leftTabs))
                    @include('defaults.partials._tab-body', array('tabs' => $leftTabs))
                    <!-- /Pills -->
                </div><!-- /Well -->
            @show
        </div><!-- /Column 1-->
        
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><!-- Column 2-->
            @section('col2')
                //edit 'section('col1')
            @show
        </div><!-- / Column 2-->
    </div><!-- / Container for Columns -->

@stop