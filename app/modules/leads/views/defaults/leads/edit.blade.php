@extends('layouts.show')


@section('page-title')
    <h1>
        <i class="fa fa-user"></i> {{ $record->fullName }}
    </h1>
    <p class="lead">
        You met each other <em>roughly</em> {{ $record->created_at }}.
    </p>
    
@stop 

@section('actions-list')
    <li><a href="{{ route('app.contacts.create') }}"><p><em>Create new {{ $config['contacts']['label'] }}</em></p></a></li>
@stop

@section('overview')
    <h3 class="text-primary"><i class="fa fa-info-circle"></i> Overview</h3>
    
    {{ Former::open()
    ->role('Form')
    ->class('ajax-form')
    ->ajaxMethod('PUT')
    ->method('PUT')
    ->route('api.v1.contacts.update', $record->id)
    ->populate($record->resource);
    
    }}
        <div class="col-lg-4 col-md-5 col-sm-4  col-xs-12">
            {{ Former::select('title')->class('form-control ')->options($config['titles'])->formGroup('col-lg-12') }}
        </div>
        
        <div class="col-lg-8 col-md-7 col-sm-8  col-xs-12">
            {{ Former::text('first_name')->class('form-control')->placeholder('E.g. Lionel') }}
        </div>
        
        <div class="col-lg-7 col-md-7 col-sm-12  col-xs-12">
            {{ Former::text('last_name')->class('form-control ')->placeholder('E.g. Blair') }}
        </div>

        <div class="col-lg-5 col-md-5 col-sm-12  col-xs-12">
            {{ Former::text('nickname')->class('form-control ')->placeholder('E.g. Blair')->label('Known As') }}
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-12  col-xs-12">
            {{ Former::text('legacy_id')->class('form-control ')->placeholder('Not a member')->label('Memb No')->disabled() }}
        </div>

        <div class="col-lg-8 col-md-8 col-sm-12  col-xs-12">
            {{ Former::text('email')->class('form-control ')->placeholder('E.g. Blair') }}
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>

@stop

@section('inDepth')
    <h3 class="text-primary"><i class="fa fa-folder-open"></i> In-Depth</h3>
    
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 form-inline">
            {{ Former::radios('gender')
                  ->radios(array(
                  ' <i class="fa fa-male "></i> Male  ' => array('name' => 'gender', 'value' => 'male'),
                  ' <i class="fa fa-female "></i> Female  ' => array('name' => 'gender', 'value' => 'female')
                  ))->label(false) }}
        </div>

        
        <div class="col-lg-8 col-md-7 col-sm-12  col-xs-12">
            {{ Former::email('email2')->class('form-control input-sm')->placeholder('E.g. Lionel@hotmail.com')->label('Email 2')->help('The format paul@fcutd.co.uk') }}
        </div>
        
        <div class="col-lg-4 col-md-5 col-sm-12  col-xs-12">
            {{ Former::date('date_of_birth')->class('form-control input-sm')->placeholder('25/05/77') }}
        </div>

        <div class="form-group">
            <h4>Address:</h4>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            <div class="form-group">
                <div class="input-group col-lg-7 col-md-7 col-sm-9 col-xs-12 ">
                    <input type="text" name="postcode"  class="form-control" value="{{ $record->postcode }}" placeholder="Type Postcode">
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="button">Type Postcode</button>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('company')->class('form-control input-sm')->placeholder('E.g. Haribo Plc.') }}
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('address1')->class('form-control input-sm')->placeholder('E.g. Tangtastic House')->label('Address Line 1') }}
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('address2')->class('form-control input-sm')->placeholder('E.g. 22, Confection Street')->label('Address Line 2') }}
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('address3')->class('form-control input-sm')->placeholder('E.g. Sweetingborough')->label('Address Line 3') }}
        </div>
        
        <div class="col-lg-8 col-md-7 col-sm-7  col-xs-12">
            {{ Former::text('city')->class('form-control input-sm')->placeholder('E.g. Chewton')->label('Town/City') }}
        </div>
        

        <div class="col-lg-4 col-md-5 col-sm-5  col-xs-12">
            <div class="form-group">
                <label for="fake_postcode" class="control-label">Postcode</label>
                <input class="form-control input-sm" placeholder="E.g. SW33 TIE" id="fake_postcode" type="text" disabled  value="{{ $record->postcode }}"></div>
        </div>
        
        <div class="col-lg-7 col-md-7 col-sm-7  col-xs-12">
            {{ Former::text('county')->class('form-control input-sm')->placeholder('E.g. Treatshire') }}
        </div>
        
        <div class="col-lg-5 col-md-5 col-sm-5  col-xs-12">
            {{ Former::text('country')->class('form-control input-sm')->placeholder('E.g. United Kingdom') }}
        </div>
        
        <div class="form-group">
            <h4>Contact:</h4>
        </div>

        <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <div class="input-group input-group-sm ">
                    <span class="input-group-addon">@</span>
                    <input type="text" name="twitter_id" class="form-control" placeholder="Don't include the @">
                </div>
            </div>
        </div>

        <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <div class="input-group input-group-sm ">
                    <span class="input-group-addon">(00)</span>
                    <input type="text" name="overseas_phone" class="form-control" placeholder="44 770334563">
                </div>
            </div>
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>
@stop

@section('optIn')
    <h3 class="text-primary"><i class="fa fa-lock"></i> Opt Ins</h3>
        
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 form-inline">
            <h4 class="radio-label hidden-md hidden-lg">Receive Emails? </h4>
            {{ Former::radios('optin_email')
                  ->radios(array(
                  ' <i class="fa fa-thumbs-o-up "></i> Yes  ' => array('name' => 'optin_email', 'value' => '1'),
                  ' <i class="fa fa-thumbs-o-down "></i> No  ' => array('name' => 'optin_email', 'value' => '0')
                  ))->label('<h4 class="radio-label visible-md visible-lg">Receive Emails?</h4>') }}
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 form-inline">
            <h4 class="radio-label  hidden-md hidden-lg">Receive Texts?</h4>
            {{ Former::radios('optin_sms')
                  ->radios(array(
                  ' <i class="fa fa-thumbs-o-up "></i> Yes  ' => array('name' => 'optin_sms', 'value' => '1'),
                  ' <i class="fa fa-thumbs-o-down "></i> No  ' => array('name' => 'optin_sms', 'value' => '0')
                  ))->label('<h4 class="radio-label visible-md visible-lg">Receive Texts?</h4>') }}
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 form-inline">
            <h4 class="radio-label hidden-md hidden-lg">Receive Post?</h4>
            {{ Former::radios('optin_post')
                  ->radios(array(
                  ' <i class="fa fa-thumbs-o-up "></i> Yes  ' => array('name' => 'optin_post', 'value' => '1'),
                  ' <i class="fa fa-thumbs-o-down "></i> No  ' => array('name' => 'optin_post', 'value' => '0')
                  ))->label('<h4 class="radio-label visible-md visible-lg">Receive Post?</h4>') }}
        </div>


        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>

    {{ Former::close() }}
@stop

@section('notes')
    <h3 class="text-primary"><i class="fa fa-book"></i> Notes</h3>
    
        <div class="panel-group" id="accordion">
            <div class="panel panel-default panel-accordian">
                @foreach( $record->notes as $n )
                    <div class="panel-heading clearfix">
                        <p class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#{{ $n->id }}">
                                <b class="caret"> </b> 
                                 {{ $n->note_name }} 
                            </a>
                            </a>
                        </p>
                    </div>
                    <div id="{{ $n->id }}" class="panel-collapse collapse ">
                        <div class="panel-body">
                            <p>{{ $n->note_body }}</p>
                            <p class=""><em>
                                <h6 class="muted ">({{ $n->created_at->toDayDateTimeString() }})</h6>
                            </em></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    
    
    <div class="pull-right margin_top_15" style="margin-top:10px">
        <a class="btn btn-primary open-modal " href="#" modal-source="{{URL::route('app.notes.create', array('contact_id' => $record->id)) }}" data-view="show_modal" >
            <i class="fa fa-plus"></i> Create New Note
        </a>
    </div>

@stop


@section('purchases')
    <h3 class="text-primary"><i class="fa fa-gbp"></i> Purchases</h3>
    <ul class="list-group">
        @foreach( $record->orders as $o )
            <li class="list-group-item">
                <i class="fa fa-chevron-right"></i> {{ $o->temp_item}} ({{$o->temp_season}}) <a href="#" class="btn btn-default btn-xs pull-right open-modal" modal-source="{{ Url::route('app.orders.edit', $o->id)}}">View</a>
            </li>
        @endforeach
    </ul>
    <a class="btn btn-primary pull-right open-modal" href="#" modal-source="{{ URL::route('app.orders.create', array('contact_id' => $record->id)) }}" data-view="show_modal" ><i class="fa fa-plus"></i> Create New Purchase</a>
@stop

@section('roles')
    <h3 class="text-primary"><i class="fa fa-gbp"></i> Roles</h3>
    <ul class="list-group">
        @foreach( $record->orders as $o )
            <li class="list-group-item">
                <i class="fa fa-chevron-right"></i> {{ $o->order_title}} ({{$o->payment_method}}) <a href="#" class="btn btn-default btn-xs pull-right open-modal" modal-source="{{ Url::route('app.orders.edit', $o->id)}}">View</a>
            </li>
        @endforeach
    </ul>
    <a class="btn btn-primary pull-right open-modal" href="#" modal-source="{{ URL::route('app.orders.create', array('contact_id' => $record->id)) }}" data-view="show_modal" ><i class="fa fa-plus"></i> Create New Role</a>
@stop

@section('modal')
    @include('partials.common._modal', array('modalTitle' => $record->fullName))
@stop

