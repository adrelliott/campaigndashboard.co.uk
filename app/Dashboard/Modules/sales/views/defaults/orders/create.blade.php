@extends('layouts.modal')

@section('modal-body')
    <h1>Create an order</h1>
    <div class="row">  
        {{ Former::open()
        ->role('Form')
        ->class('modal-ajax-form')
        ->tableId('orders')
        ->method('POST')
        ->ajaxMethod('POST')
        ->route('app.orders.store');
        }}

        @section('create-form-top')

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                {{ Former::text('order_title')->class('form-control input-sm copy-destination')->label('Order Summary')->placeholder('Add summary of order here')->label('Order Title') }}
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    {{ Former::date('order_date')->class('form-control input-sm')->label('Order Date')->value(date('Y-m-d', time()))->label('Order Date') }}
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    {{ Former::select('order_source')->class('form-control input-sm')->options($config['orderSource'])->label('Order Source') }}
                </div>
            </div>

        @show

        

        @section('orderitems-form')
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table id="lineitems" >
                    <tr>
                        <th style="width:40%">Product</th>
                        <th style="width:30%">Variant</th>
                        <th style="width:10%">Qty</th>
                        <th style="width:15%">Price</th>
                    </tr>
                    <tr >
                        <td>
                            {{ Former::select('_order_product[product_id][]')->class('form-control input')->options($record->productList()) }}
                        </td>
                        <td>
                            {{ Former::select('_order_product[variant][]')->class('form-control input')->options($config['seasons'])}}
                        </td>
                        <td>
                            {{ Former::text('_order_product[quantity][]')->class('form-control input')->value(0) }}
                        </td>
                        <td>
                            {{ Former::text('_order_product[price][]')->class('form-control input')->value(0) }}
                        </td>
                    </tr>
                </table>
                <a class="add_row pull-right" data-tableid="lineitems"><h5><i class="fa fa-plus"></i> Add more items</h5></a>
            </div>
        
        @show

        @section('create-form-bottom')

            <div class="form-group col-lg-6 col-md-6 col-sm-6  col-xs-12">
                {{ Former::textarea('order_notes')->class('form-control input')->placeholder('E.g. Send out the card recorded delivery')->rows(5)->label('Order Notes') }}
            </div>

            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                
                <div class="1col-lg-offset-8 col-lg-12 1col-md-offset-8 col-md-12 1col-sm-offset-6 col-sm-12 1col-xs-offset-2 col-xs-12">
                    {{ Former::text('_order_total')->class('form-control input-sm')->label('Total') }}
                </div>
                <div class="1col-lg-offset-8 col-lg-12 1col-md-offset-8 col-md-12 1col-sm-offset-6 col-sm-12 1col-xs-offset-2 col-xs-12">
                    {{ Former::select('payment_method')->class('form-control input-sm')->options($config['paymentMethod'])->label('Payment Method') }}
                </div>
            </div>

        @show

            <input type="hidden" class="" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" class="" name="contact_id" value="{{ Input::get('contact_id') }}">

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Save</button>
            </div>   

        {{ Former::close() }}
    </div>
    
@stop