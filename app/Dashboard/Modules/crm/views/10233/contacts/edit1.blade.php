@extends('crm::defaults.contacts.edit')


@section('overview')
    <h3 class="text-primary"><i class="fa fa-info-circle"></i> Overview</h3>
    
    {{ Former::open()
    ->role('Form')
    ->class('ajax-form')
    ->ajaxMethod('PUT')
    ->method('PUT')
    ->route('app.contacts.update', $record->id)
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
            {{ Former::text('nickname')->class('form-control ')->placeholder('E.g. Li The Guy')->label('Known As') }}
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-12  col-xs-12">
             {{ Former::select('record_type')->class('form-control ')->options($config['businessTypes'])->formGroup('col-lg-12') }}
        </div>

        <div class="col-lg-8 col-md-8 col-sm-12  col-xs-12">
            {{ Former::text('email')->class('form-control ')->placeholder('E.g. dancing_li@hotmail.com') }}
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>

@stop

@section('inDepth')
    <h3 class="text-primary"><i class="fa fa-folder-open"></i> In-Depth</h3>

        
        <div class="col-lg-8 col-md-7 col-sm-12  col-xs-12">
            {{ Former::email('email2')->class('form-control input-sm')->placeholder('E.g. Lionel@hotmail.com')->label('Email 2') }}
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
                    <input type="text" name="twitter_id" class="form-control" placeholder="Twitter Id">
                </div>
            </div>
        </div>

        <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <div class="input-group input-group-sm ">
                    <span class="input-group-addon">(00)</span>
                    <input type="text" name="overseas_phone" class="form-control" placeholder="Overseas phone Number">
                </div>
            </div>
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>
@stop


@section('modal')
    @include('partials.common._modal', array('modalTitle' => $record->fullName))
@stop

