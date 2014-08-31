<?php

$array = array(
    'draw' => (int)$draw,
    'recordsFiltered' => $total,
    'recordsTotal' => $total,
    'data' => array()
);

foreach($results as $row)
{
    $editUrl = URL::route('app.contacts.roles.edit', [ 'contacts' => $contact->id, 'roles' => $row->id ]);
    $deleteUrl = URL::route('app.contacts.roles.destroy', [ 'contacts' => $contact->id, 'roles' => $row->id ]);

    $array['data'][] = array(
        
        // Row data
        'role' => $row->role,
        'start' => substr($row->pivot->start, 0, 10),
        'end' => substr($row->pivot->end, 0, 10),
        'edit' => '<a href="' . $editUrl . '" class="open-modal" modal-source="' . $editUrl . '"><i class="fa fa-pencil"></a>',
        'delete' => '<a href="' . $deleteUrl . '" data-method="delete"><i class="fa fa-times"></a>',
        
    );
}

echo json_encode($array);