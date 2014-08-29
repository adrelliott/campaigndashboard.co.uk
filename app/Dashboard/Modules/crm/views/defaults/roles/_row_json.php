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
        'role' => $row->role,
        'start' => $row->pivot->start,
        'end' => $row->pivot->end,
        
    );
}

echo json_encode($array);