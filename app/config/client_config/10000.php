<?php

return array(


     /*
    |--------------------------------------------------------------------------
    | App Settings
    |--------------------------------------------------------------------------
    |
    */
    'users' => array(
        'total_number' => 'unlimited'
    ),

    'contacts' => array(
        'label' => 'client',
    ),

    'leads' => array(
        'label' => 'lead',
    ),

    'logos' => array(
        'logoSmall' => '/assets/img/bootstrap/cdash_logo75px.png',
        'logoLarge' => '/assets/img/bootstrap/cdash_logo150px.png',
    ),



     /*
    |--------------------------------------------------------------------------
    | Navbar
    |--------------------------------------------------------------------------
    |
    | The settings for the navbar files
    |
    | NOTE: The admin level for each menu item has to be less than than the current logged in user for them to see it. 
    |  e.g. min_admin_level = 2, means users with admin 0, 1 & 2 can see it, but 3, 4 & 5 cannot
    |
    */

    'navbar' => array(
        'home' => array(
            'route' => 'app/dashboard',
            'icon' => 'tachometer',
            'label' => 'Dashboard',
            'min_admin_level' => 3,
            'dropdowns' => array(),
        ),
        'contacts' => array(
            'route' => 'app/contacts',
            'icon' => 'user',
            'label' => 'Contacts',
            'min_admin_level' => 3,
        'dropdowns' => array(),
        ),
        'marketing' => array(
            'route' => '',
            'icon' => 'bolt',
            'label' => 'Marketing',
            'min_admin_level' => 3,
            'dropdowns' => array(
                'dropdown1' => array(
                    'route' => 'app/broadcasts',
                    'icon' => 'bullhorn',
                    'label' => 'Broadcasts',
                    'min_admin_level' => 3,
                ),
                'dropdown2' => array(
                    'route' => 'app/broadcasts',
                    'icon' => 'bullhorn',
                    'label' => 'restricted',
                    'min_admin_level' => 0,
                ),
            ),
        ),
        'admin' => array(
            'route' => '',
            'icon' => 'bolt',
            'label' => 'Admin',
            'min_admin_level' => 1,
            'dropdowns' => array(
                'dropdown1' => array(
                    'route' => 'app/users',
                    'icon' => 'bullhorn',
                    'label' => 'Users',
                    'min_admin_level' => 3,
                ),
                'dropdown2' => array(
                    'route' => 'app/broadcasts',
                    'icon' => 'bullhorn',
                    'label' => 'restricted',
                    'min_admin_level' => 0,
                ),
            ),
        ),
    ),

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
        'col2tabs' => ['purchases', 'tags'],
    ),

    //The tabs for views/contacts/show.blade.php
    'usersshow' => array(
        'col1tabs' => ['Details', 'Permissions'],
        //'col2tabs' => ['Purchases', 'Roles'],
    ),


    /*
    |--------------------------------------------------------------------------
    | Tables
    |--------------------------------------------------------------------------
    |
    | The settings for each table
    |
    */
    'tables' => array(

        //The table displayed on contacts/index
        'contacts_index' => array(
            'options' => array(
                'setUrl' => '/api/contacts?datatable=true&cols=id,first_name,last_name,owner_id',
                'addColumn' => array('Id', 'First name', 'Last Name'),
                'setOptions' => array(
                    //'sPaginationType' => 'bootstrap',
                    // 'iDisplayLength' => 10,
                    // 'bLengthChange' => false,
                ),
                'setCustomValues' => array(
                    'linkurl' => '/app/contacts',
                    'showid' => true,
                    'idisplaylength' => 5,
                ),
            ),
            'tableTemplate' => 'partials.app._indexTable',
        ),

    ),
   


    /*
    |--------------------------------------------------------------------------
    | Forms
    |--------------------------------------------------------------------------
    |
    | The settings for each form in the app
    |
    | NOTE: Very important:
    |   1. You cannot apply 'input-lg' to radio, checkboxes or multiple selects
    |   2. You can set a default value by defining 'value' => yourvalue
    |   3. Anything under 'inputAttributes' is set as key=value in the <input> 
    |       tag, e.g. 'mykey' => 'value', is <input mykey="value" >
    |   4. Specify a 'multiple' => '' index on inputAttributes to create multiple select
    |   5. For dropdowns, radio or checkboxes you can specify the index of the dropdown array
    |       (in this config file) or an array of new values
        6. Put the fields in order that you wnat them to show up 
    |   SEE EXAMPLE BELOW:
    */
    'forms' => array(

            /* *** EXAMPLE FIELD SETUP *** **/
                'col_name' => array(
                    'type' => 'select', //seelct, text, radio etc
                    'config' => array(
                        'responsiveClass' => 'col-lg-12 col-md-12 col-sm-12  col-xs-12',
                        'responsiveClass' => FALSE, //This doesn;t create a wrapping div 
                        'label' => 'New label', //Leave blank to create label from name, or FALSE to have no label
                        'labelClass' => '', //add label class here
                        'wrapClass' => '', //Leave blank for 'form-group' or FALSE to not have one ( but we cannot show errors via ajax if we do this)
                        'options' => 'titles', // either add index in dropdowns, 
                                                //or an array of options
                        'value' => 2,   // Set a default value (overidden by value from model)
                        'inputAttributes' => array( //Anything added here is added to <input>
                            'class' => 'input-lg',  // Don't use input-lg on radio/checkbox/select
                            'placeholder' => 'Add placeholder here',
                            // 'multiple' => '', // Add multiple for <select multiple >
                            'test' => 'nice',   //<input test="nice">
                        ), 
                    ),
                ),

            /* Defaults - This si the default in then FormBuilder class*/
            // $defaultConfig = array(
            //     'wrapClass' => 'form-group',
            //     'responsiveClass' => 'col-lg-12 col-md-12 col-sm-12  col-xs-12',
            //     'labelClass' => '',
            //     'inputClass' => '',
            //     'extra' => '',
            //     'helpBlock' => FALSE,
            //     'checked' => FALSE,
            //     'inputAttributes' => array(),
            //     'value' => null,
            //     'type' => 'text',

            // );




        /* Contacts */
        'contacts' => array(
            
            /* FORM: Create Contacts */
            'create' => array(
             
                'first_name' => array('
                    inputAttributes' => array(
                        'class' => 'input-lg',
                        'id' => 'copy-source',
                    ),
                ),
                'last_name' => array('inputAttributes' => array('class' => 'input-lg')),
                'email' => array('inputAttributes' => array('class' => 'input-lg')),
                'nickname' => array('inputAttributes' => array(
                    'class' => 'input-lg copy-destination',
                    ),
                ),

            ),
            
            /* FORM: Edit overview of Contacts */
            'edit_overview' => array(
             
                'title' => array(
                    'type' => 'select',
                    'options' => 'titles',
                ),
                'first_name' => array(
                    'inputAttributes' => array('class' => 'input-lg')
                ),
                'last_name' => array(
                    'inputAttributes' => array('class' => 'input-lg'),
                    'helpBlock' => 'This si the passed help',
                ),
                'email' => array('inputAttributes' => array('class' => 'input-lg')),
                'gender' => array(
                    'type' => 'radio',
                    'options' => 'genders',
                    'labelClass' => 'radio-inline',
                ),

            ),

            /* FORM: Edit indepth of Contacts */
            'edit_indepth' => array(
             
                // 'title' => array(
                //     'type' => 'select',
                //     'options' => 'titles',
                // ),
                // 'first_name' => array('inputAttributes' => array('class' => 'input-lg')),
                // 'last_name' => array('inputAttributes' => array('class' => 'input-lg')),
                // 'email' => array('inputAttributes' => array('class' => 'input-lg')),
                // 'gender' => array(
                //     'type' => 'radio',
                //     'options' => 'genders',
                //     'labelClass' => 'radio-inline',
                // ),

            ),

            /* FORM: Edit optin for Contacts */
            'edit_optin' => array(
                
                'optin_email' => array(
                    'type' => 'radio',
                    'options' => array(
                        1 => 'Receive Emails',
                        0 => 'No Emails',
                    ),
                    'labelClass' => 'radio-inline',
                ),
                'optin_sms' => array(
                    'type' => 'radio',
                    'options' => array(
                        1 => 'Receive SMS',
                        0 => 'No SMS',
                    ),
                    'labelClass' => 'radio-inline',
                ),
                'optin_post' => array(
                    'type' => 'radio',
                    'value' => 1,
                    'options' => array(
                        1 => 'Receive Post',
                        0 => 'No Post',
                    ),
                    'labelClass' => 'radio-inline',
                ),

            ),


        ),
    ),




    /*
    |--------------------------------------------------------------------------
    | Dropdowns
    |--------------------------------------------------------------------------
    |
    | Dropdowns for the forms
    |           'value' => 'label'
    */
    'dropdowns' => array(

        // standard
        'genders' => array(
            'male' => 'Male',
            'female' => 'Female'
        ),
        'yesno' => array(
            1 => 'Yes',
            2 => 'No',
        ),
        'optin' => array(
            1 => 'Opted In',
            2 => 'Opted Out',
        ),



        // Contacts
        'titles' => array(
            '' => '',
            'Mr' => 'Mr',
            'Mrs' => 'Mrs',
            'Miss' => 'Miss',
            'Ms' => 'Ms',
            'Dr' => 'Dr',
        ),



         // Notes
        'noteTypes' => array(
            '' => '',
            'Mr' => 'Mr',
            'Mrs' => 'Mrs',
            'Miss' => 'Miss',
            'Ms' => 'Ms',
            'Dr' => 'Dr',
        ),



        // Orders
        'orderSource' => array(
            '' => '',
            'Online' => 'Online',
            'Post' => 'Post',
            'Telephone' => 'Telephone',
            'Telephone' => 'Telephone',
            'Office' => 'Office',
            'Stall' => 'Stall',
        ),

        'paymentMethod' => array(
            '' => '',
            'Cash' => 'Cash',
            'Cheque' => 'Cheque',
            'Credit-Debit Card' => 'Credit-Debit Card',
            'Standing Order' => 'Standing Order',
            'PayPal' => 'PayPal'
        ),

        
        
             // Broadcasts
        'broadcastTypes' => array(
            '' => '',
            'Newsletter' => 'Newsletter',
            'Offer' => 'Offer',
            'Event' => 'Event',
            'Other' => 'Other'
        ),
         'savedSearches' => array(
            '1' => 'All opted-in contacts',
            '2' => 'All leads',
        ),
        
        'emailFrom' => array(
            // 'Paul Howarth|paul@fc-utd.co.uk' => 'Paul Howarth',
            // 'Lindsey Howard|lindsey@fc-utd.co.uk' => 'Lindsey Howard',
            // 'Michael Holdsworth|michael@fc-utd.co.uk' => 'Michael Holdsworth',
        ),
        'testEmailto' => array(
            
        ),
        'emailTemplate' => array(
           
        ),

        

        // Admin
        'adminLevels' => array(
            '0' => 'Super Super SUPER Admin',
            '1' => 'Dashboard Super Admin',
            '2' => 'Dashboard Admin',
            '3' => 'Supervisor',
            '4' => 'User',
            '5' => 'Observer',
        ),
    ),
);
