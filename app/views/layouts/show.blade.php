@extends('layouts.app')

@section('content')
    
    <div class="row"><!-- Container for Columns -->
        @section('error-message')
            @include('partials.common._message-ajax')
        @show
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><!-- Column 1 -->
            @section('col1')
                <div class="well"><!-- Well -->
                    <!-- Pills -->
                    @if (isset($config['contactsshow']['col1tabs']))
                        @include('partials.app._tab-header', array('tabs' => $config['contactsshow']['col1tabs']))
                        @include('partials.app._tab-body', array('tabs' => $config['contactsshow']['col1tabs']))
                    @endif
                    <!-- /Pills -->

                    @section('col1-footer')
                        <div class="margin_top_30">
                            <a class="text-danger del" href="#" ><i class="fa fa-trash-o"></i> Delete this record...</a>
                        </div>
                    @show
                </div><!-- /Well -->
            @show
        </div><!-- /Column 1-->
        
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><!-- Column 2 -->
            @section('col2')
                <div class="panel panel-default"><!-- Panel -->
                    <div class="panel-body">
                        <!-- Pills -->
                        @if (isset($config['contactsshow']['col2tabs']))
                            @include('partials.app._tab-header', array('tabs' => $config['contactsshow']['col2tabs']))
                            @include('partials.app._tab-body', array('tabs' => $config['contactsshow']['col2tabs']))
                        @endif
                        <!-- /Pills -->
                    </div><!-- /Panel-body -->
                </div><!-- /Panel -->
            @show
        </div><!-- / Column 2-->
    </div><!-- / Container for Columns -->
    @section('error-message')
        @include('partials.common._message-ajax')
    @show

@stop