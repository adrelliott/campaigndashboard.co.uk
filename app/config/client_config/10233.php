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
   // Dashboard
   'dashboardindex' => array(
        'tables' => ['Contacts', 'Orders'],
        ),

   //The tabs for views/contacts/show.blade.php
    'contactsshow' => array(
        'col1tabs' => ['Overview', 'In Depth', 'Opt In', 'Notes'],
        'col2tabs' => ['Purchases', 'Tags'],
        ),

    //The tabs for views/contacts/show.blade.php
    'usersshow' => array(
        'col1tabs' => ['Details', 'Permissions'],
        //'col2tabs' => ['Purchases', 'Roles'],
        ),




    /*
    |--------------------------------------------------------------------------
    | Dropdowns
    |--------------------------------------------------------------------------
    |
    | Dropdowns for the forms
    |
    */
   
    // Seasons
    'businessTypes' => array(
        '' => 'Choose a Sector',
        'Social' => 'Social',
        'Charity' => 'Charity',
        'Private' => 'Private',
        'Public Sector' => 'Public Sector',
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
    'businessSizes' => array(
        '' => '',
        'Small' => 'Small',
        'Medium' => 'Medium',
        'Large' => 'Large',
        ),



    // Orders
    'orderSource' => array(
        '' => '',
        'Online' => 'Online',
        'Post' => 'Post',
        'Telephone' => 'Telephone',
        'Office' => 'Office',
        ),
    'paymentMethod' => array(
        '' => '',
        'Cash' => 'Cash',
        'Cheque' => 'Cheque',
        'Credit-Debit Card' => 'Credit-Debit Card',
        'Standing Order' => 'Standing Order',
        'PayPal' => 'PayPal'
        ),
    'productList' => array(
        'Ooomph consultancy' => 'Ooomph consultancy',
        'Accidental Biz Training' => 'Accidental Biz Training',
        'Ooomph Training' => 'Ooomph Training',
        'Survival Pack' => 'Survival Pack',
        'Board Booster' => 'Board Booster',
        'Innovation training' => 'Innovation training',
        'Innovation consultancy' => 'Innovation consultancy',
        'Procurement consultancy' => 'Procurement consultancy',
        'Public speaking' => 'Public speaking',
        'Facilitation services' => 'Facilitation services',
        'Other' => 'Other'
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
        '2' => 'All RS Consultants',
        '3' => 'All Blog Subscribers',
        '4' => 'All Paying Clients',
        ),
    'emailFrom' => array(
        'Isla Wilson|isla@RubyStarAssociates.co.uk' => 'Isla Wilson',
        'Rachel Warhurst|rachel@RubyStarAssociates.co.uk' => 'Rachel Warhurst',
        'RubyStar Newsletter|newsletter@RubyStarAssociates.co.uk' => 'RubyStar Newsletter',
        ),
    'testEmailto' => array(
        'isla@RubyStarAssociates.co.uk',
        'rachel@RubyStarAssociates.co.uk',
        'sales@RubyStarAssociates.co.uk'
        ),
    'emailTemplate' => array(
        '1' => 'Public newsletter',
        '2' => 'New Blog Post',
        '3' => 'RS Team',
        '4' => 'Plain text',
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





);