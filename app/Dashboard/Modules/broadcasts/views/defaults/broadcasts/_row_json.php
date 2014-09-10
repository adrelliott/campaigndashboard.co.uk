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
        'DT_RowData' => array( 'url' => URL::route('app.broadcasts.edit', $row->id), 'modal' => true ),
        'DT_RowClass' => 'linked',

        // Row data
        'id' => $row->id,
        'broadcast_title' => $row->broadcast_title,


    );
}

echo json_encode($array);