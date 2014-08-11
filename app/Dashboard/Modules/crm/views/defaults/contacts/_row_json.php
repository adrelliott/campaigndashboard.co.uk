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
        
        // Row data
        'id' => $row->id,
        'first_name' => $row->first_name,
        'last_name' => $row->last_name,
        'email' => $row->email,
        'landline' => $row->landline(),
        'mobile_phone' => $row->mobile_phone,

        // Datatables per-row configuration
        'DT_RowData' => array( 'url' => '' ),

    );
}

echo json_encode($array);