<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Views
    |--------------------------------------------------------------------------
    |
    | The settings for the view files
    |
    */
   //The tabs for views/contacts/show.blade.php
    'contactsshow' => array(
        'col1tabs' => ['Overview', 'In Depth', 'Opt In', 'Notes'],
        'col2tabs' => ['Tasks', 'Tags', 'Other'],
        ),

    'contactrules' => array(
        'first_name'                  => 'between:2,32',
        'last_name'                  => 'required|between:2,32',
        'email'                 => 'email',
    ),
        


);