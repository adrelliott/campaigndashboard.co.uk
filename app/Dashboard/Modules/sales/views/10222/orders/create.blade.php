@extends('sales::defaults.orders.create')

@section('orderitems-form')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table id="lineitems" >
            <tr>
                <th style="width:40%">Product10233</th>
                <th style="width:30%">Variant</th>
                <th style="width:10%">Qty</th>
                <th style="width:15%">Price</th>
            </tr>
            <tr >
                <td>
                    {{ Former::select('_order_product[product_id][]')->label('new label')->class('form-control input')->options($record->productList()) }}
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
@overwrite