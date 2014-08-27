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

    'orders' => array(
        'label' => 'orders',
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
    | Stats
    |--------------------------------------------------------------------------
    |
    | The stats required (often shown on homepage)
    |
    */

    'stats' => array(),

    /*
    |--------------------------------------------------------------------------
    | Views
    |--------------------------------------------------------------------------
    |
    | The settings for the view files
    |
    */
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

        // Roles
//        'roles' => array(
//            '' => '',
//            'Volunteer (Office)' => 'Volunteer (Office)',
//            'Volunteer (Matchday)' => 'Volunteer (Matchday)',
//            'Paid Office Staff' => 'Paid Office Staff',
//            'Community Staff' => 'Community Staff',
//            'Board Member' => 'Board Member',
//            'External Supplier' => 'External Supplier',
//            'Coaching/Backroom Staff' => 'Coaching/Backroom Staff',
//            '1st Team Player' => '1st Team Player',
//            'Youth Team Player' => 'Youth Team Player',
//            'Women\'s Team Player' => 'Women\'s Team Player'
//        ),






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

        'seasons' => [
            '2013/14' => '2013/14',
            '2012/13' => '2012/13',
            '2011/12' => '2011/12',
            '2010/11' => '2010/11',
            '2009/10' => '2009/10',
            '2008/09' => '2008/09',
            '2007/08' => '2007/08',
            '2006/07' => '2006/07',
            '2005/06' => '2005/06',
        ],

        
        
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
