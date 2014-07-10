@extends('sales::defaults.orders.create')

@section('create-form1')
    //this si the creat form for 10233
@stop

@section('modal-body1')
    <div class="row">  
        {{ Former::open()
        ->role('Form')
        ->class('ajax-form')
        ->id('')
        ->method('POST')
        ->ajaxMethod('POST')
        ->route('app.orders.store');
        // ->populate($record->resource);

        }}
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    {{ Former::date('order_date')->class('form-control input-sm')->label('Order Date') }}
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    {{ Former::select('order_source')->class('form-control input-sm')->options($config['orderSource']) }}
                </div>
            </div>
           
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                {{ Former::select('temp_item')->class('form-control input')->options($config['productList'])->label('Item Bought') }}
            </div>
    
            <div class="form-group col-lg-6 col-md-6 col-sm-6  col-xs-12">
                {{ Former::textarea('order_notes')->class('form-control input')->placeholder('E.g. Send out pack recorded delivery')->rows(5) }}
            </div>

            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                
                <div class="1col-lg-offset-8 col-lg-12 1col-md-offset-8 col-md-12 1col-sm-offset-6 col-sm-12 1col-xs-offset-2 col-xs-12">
                    {{ Former::text('order_total')->class('form-control input-sm')->label('Total') }}
                </div>
                <div class="1col-lg-offset-8 col-lg-12 1col-md-offset-8 col-md-12 1col-sm-offset-6 col-sm-12 1col-xs-offset-2 col-xs-12">
                    {{ Former::select('payment_method')->class('form-control input-sm')->options($config['paymentMethod']) }}
                </div>
            </div>

            <input type="hidden" class="" name="user_id" value="{{ Auth::user()->user()->id }}">
            <input type="hidden" class="" name="contact_id" value="{{ Input::get('contact_id') }}">

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Save</button>
            </div>   

        {{ Former::close() }}
    </div>
@stop