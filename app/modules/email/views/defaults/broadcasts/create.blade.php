@extends('layouts.index')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> Create a new Broadcast
    </h1>
    <p class="lead">
        Add the basic details (more options on the next page).
    </p>
@stop

@section('content')
    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12"><!-- Column 1-->
        <div class="well clearfix"><!-- Well -->
            {{ Former::open()
            ->role('Form')
            ->class('')
            ->id('')
            ->ajaxMethod('POST')
            ->method('POST')
            ->route('app.broadcasts.store');
            // ->populate($record->resource);  
        }}
        
            <div class="form-group col-lg-8 col-md-8 col-sm-12  col-xs-12">
                {{ Former::text('broadcast_name')->class('form-control input-lg')->placeholder('E.g. Weekly Newsletter ') }}
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12  col-xs-12">
                {{ Former::select('broadcast_type')->class('form-control input-lg')->options($user->config['broadcastTypes']) }}
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                {{ Former::textarea('broadcast_description')->class('form-control input-lg')->placeholder('E.g. news from the latest match, updates on the ground and special offers')->rows(3) }}
            </div>
            <div class="form-group col-lg-8 col-md-6 col-sm-12 col-xs-12">
                <p class="help-block"><strong>"Oh no! Where do I write my email?"</strong><br/> Calm down dear, there's space on the next page for all that</p>
            </div>
            <div class="form-group col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Create this Broadcast</button>
            </div>   
        </div><!-- /Well -->
    </div><!-- /Column 1 -->
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12"><!-- Column 2-->
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>What's all this about?</h3>
                <p>After a while, you'll have done so many mailouts (we hope) that you'll forget you said on each one.</p>
                <p>Add a name and description here so that you'll be able to find this in the future.</p>
                <i>Pssst. Your recipients <strong>won't</strong> be able to see what you write here.</i>
            </div>
        </div>
        {{ Former::close() }}
    </div><!-- /Column 2 -->
    
    
@stop


