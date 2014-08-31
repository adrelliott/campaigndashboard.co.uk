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
        'start' => substr($row->pivot->start, 0, 10),
        'end' => substr($row->pivot->end, 0, 10),
        // 'edit' => HTML::link(URL::route('app.contacts.roles.edit', $row->contact_id, $row->role_id), 'Edit'),
        'delete' => '<a href="' . URL::route('app.contacts.roles.destroy', [ 'contacts' => $contact->id, 'roles' => $row->id ]) . '" data-method="delete"><i class="fa fa-times"></a>',
        
    );
}

echo json_encode($array);