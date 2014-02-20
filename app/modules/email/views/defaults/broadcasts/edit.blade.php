@extends('layouts.index')

@section('page-title')
    <h1>
        <i class="fa fa-bullhorn"></i> Edit your Broadcast
    </h1>
    <p class="lead">
        Customise your broadcast and send it on it's way.
    </p>
@stop

@section('content')
    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12"><!-- Column 1-->
        <div class="well clearfix"><!-- Well -->
            {{ Former::open()
            ->role('Form')
            ->class('')
            ->id('')
            ->ajaxMethod('PUT')
            ->method('PUT')
            ->route('app.broadcasts.update', $record->id)
            ->populate($record->resource);  
        }}
        
            <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                {{ Former::select('search_id')->class('form-control input-lg')->options($config['savedSearches'])->label('Who is this email to?') }}
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                {{ Former::text('subject_line')->class('form-control input-lg')->placeholder('E.g. Are you coming to the match?')->label('Subject Line') }}
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                {{ Former::textarea('broadcast_body')->class('form-control input-lg wysihtml5')->placeholder('Write your email here. E.g. Hi <<first_name>>, Do you fancy half price tickets this weekend?')->rows(20)->help('<span class="text-primary"><i class="fa fa-lightbulb-o"></i> Don\'t forget, you can personalise your emails using &#123;&#123;first_name&#125;&#125;, &#123;&#123;last_name&#125;&#125; or &#123;&#123;nickname&#125;&#125;</span>') }}
            </div>
            
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Create this Broadcast</button>
            </div>   
        </div><!-- /Well -->
    </div><!-- /Column 1 -->
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12"><!-- Column 2-->
        <div class="panel panel-default"><!-- Panel 1 -->
            <div class="panel-heading">
                <h3 class="panel-title">About this Broadcast</h3>
            </div>
            <div class="panel-body form-inline">
                <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                    {{ Former::textarea('broadcast_name')->class('form-control input-sm')->rows(3)->placeholder('E.g. Weekly Newsletter ')}}
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                    {{ Former::textarea('broadcast_description')->class('form-control input-sm')->placeholder('E.g. news from the latest match, updates on the ground and special offers')->rows(6)->label('Description') }}
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
                </div>
            </div>
        </div><!-- /Panel 1 -->

        @if ($record->sent)
            <div class="panel panel-default"><!-- Panel 2 -->
                <div class="panel-heading">
                    <h3 class="panel-title">Sent Details</h3>
                </div>
                <div class="panel-body">
                    <p class="text-success"><i class="fa fa-check"></i> This email was sent on {{ $record->sent_at }}</p>
                    <a href="#" class="text-primary"><i class="fa fa-wrench"></i> View Analytics...</a>
                </div>
            </div><!-- /Panel 2 -->
        @else
            <div class="panel panel-default"><!-- Panel 3 -->
                <div class="panel-heading">
                    <h3 class="panel-title">About this Email</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        {{ Former::select('broadcast_from')->class('form-control input-sm')->options($config['emailFrom'])->label('Who is this email from?') }}
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        {{ Former::select('broadcast_template')->class('form-control input-sm')->options($config['emailTemplate'])->label('Email Template') }}
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        <h5>Ready to Send?</h5>
                        {{ Former::radios('ready_to_send')
                              ->radios(array(
                              ' <i class="fa fa-thumbs-o-up "></i> Yes' => array('name' => 'ready_to_send', 'value' => '1'),
                              ' <i class="fa fa-thumbs-o-down "></i> No' => array('name' => 'ready_to_send', 'value' => '0')
                              ))->label(false) }}
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
                    </div>
                </div>
            </div><!-- /Panel 3-->

        {{ Former::close() }}
            
            <div class="panel panel-default"><!-- Panel 4 -->
                <div class="panel-heading">
                    <h3 class="panel-title">Tests & Sending</h3>
                </div>
                <div class="panel-body">
                    {{ Former::open() }}
                    
                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        {{ Former::select('_test_send_to')->class('form-control input-sm')->label(false)->options($config['testEmailto'])->label('Send a test to:') }}
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        <small><a href="#" class="unhide_div" div-class="test_other">Send to someone not on this list?</a></small>
                    </div>

                    <div class="test_other hide">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                             {{ Former::text('_test_send_to')->class('form-control input-sm')->placeholder('E.g. matt@fc-utd.co.uk')->label('Email Address') }}
                        </div>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-thumbs-o-up"></i> Send Test Email</button>
                    </div>
                    {{Former::close() }}

                </div>
                @if( $record->ready_to_send )
                    <div class="panel-footer">
                        <div class="row center-block">
                            <!-- <div class="form-group col-lg-12 col-md-12 col-sm-12"> -->
                                <a href="#" class="btn btn-primary btn-lg pull-right confirmation-check" confirmation-message="Do you want REALLY want to send this broadcast? (There is no UNDO!)"><i class="fa fa-envelope-o"></i> Send for Real</a>
                            <!-- </div>     -->
                        </div>
                    </div>
                @endif

            </div><!-- /Panel 4 -->
        @endif

    </div><!-- /Column 2 -->
    
    
@stop


