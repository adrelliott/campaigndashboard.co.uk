<?php

$array = array(
    'draw' => (int)$draw,
    'recordsFiltered' => $total,
    'recordsTotal' => $total,
    'data' => array()
);

foreach($results as $row)
{
    $array['data'][] = array(
        
        // Datatables per-row configuration
        'DT_RowData' => array( 'url' => URL::route('app.contacts.edit', $row->id), 'modal' => true ),
        'DT_RowClass' => 'linked',

        // Row data
        'id' => $row->id,
        'first_name' => $row->first_name,
        'last_name' => $row->last_name,
        'email' => $row->email,
        'landline' => $row->landline(),
        'mobile_phone' => $row->mobile_phone,

    );
}

echo json_encode($array);