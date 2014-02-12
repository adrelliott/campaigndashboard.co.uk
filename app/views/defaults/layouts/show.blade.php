@extends('defaults.layouts.standard')

@section('content')
    
    <div class="row"><!-- Container for Columns -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><!-- Column 1 -->
            @section('col1')
                <div class="well"><!-- Well -->
                    <!-- Pills -->
                    @if (isset($user->config['contactsshow']['col1tabs']))
                        @include('defaults.partials._tab-header', array('tabs' => $user->config['contactsshow']['col1tabs']))
                        @include('defaults.partials._tab-body', array('tabs' => $user->config['contactsshow']['col1tabs']))
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
                <!-- Pills -->
                @if (isset($user->config['contactsshow']['col2tabs']))
                    @include('defaults.partials._tab-header', array('tabs' => $user->config['contactsshow']['col2tabs']))
                    @include('defaults.partials._tab-body', array('tabs' => $user->config['contactsshow']['col2tabs']))
                @endif
                <!-- /Pills -->
            @show
        </div><!-- / Column 2-->
    </div><!-- / Container for Columns -->

@stop