<?php

return array(


     /*
    |--------------------------------------------------------------------------
    | App Settings
    |--------------------------------------------------------------------------
    |
    */
    'users' => array(
        'total_number' => 'up to 10'
        ),

    'contacts' => array(
        'label' => 'fan',
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
            'label' => 'Fans',
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
        'col2tabs' => ['Purchases'],
        ),

    //The tabs for views/contacts/show.blade.php
    'usersshow' => array(
        'col1tabs' => ['Details', 'Permissions'],
        'col2tabs' => ['Password'],
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
    'seasons' => array(
        '' => 'Choose a Season',
        '2013/14' => '2013/14',
        '2012/13' => '2012/13',
        '2011/12' => '2011/12',
        '2010/11' => '2010/11',
        '2009/10' => '2009/10',
        '2008/09' => '2008/09',
        '2007/08' => '2007/08',
        '2006/07' => '2006/07',
        '2005/06' => '2005/06',
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
    'productList' => array(
        '' => 'Choose a product...',
        1 => 'Adult Membership',
        2 => 'Junior Membership',
        3 => 'Season Ticket (Adult)',
        4 => 'Season Ticket (Junior)',
        5 => 'Community Shares',
        6 => 'TreasureLine',
        7 => 'Holiday Draw',
        8 => '127 Club',
        9 => 'Match Sponsor',
        10 => 'Matchball Sponsor',
        11 => 'Matchday Programme Sponsor',
        12 => 'Programme Adverts',
        13 => 'Pitchside Hording',
        14 => 'Pink Sponsorship',
        15 => 'Newsletter Sponsor',
        16 => 'Community Sponsor',
        17 => 'Youth Team Sponsor',
        18 => 'Women Team Sponsor',
        19 => 'Player Sponsor',
        20 => 'Club Donations',
        21 => 'DF Donations',
        22 => 'Club Events',
        23 => 'Merchanidise',
        24 => 'Away Match Travel',
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
        '2' => 'All Season Ticket holders',
        '3' => 'All Adult Members',
        '4' => 'All Members',
        ),
    'emailFrom' => array(
        'Paul Howarth|paul@fc-utd.co.uk' => 'Paul Howarth',
        'Lindsey Howard|lindsey@fc-utd.co.uk' => 'Lindsey Howard',
        'Michael Holdsworth|michael@fc-utd.co.uk' => 'Michael Holdsworth',
        ),
    'testEmailto' => array(
        'paul@fc-utd.co.uk',
        'lindsey@fc-utd.co.uk',
        'Michael@fc-utd.co.uk'
        ),
    'emailTemplate' => array(
        '1' => 'FC Red',
        '2' => 'FC Black',
        '3' => 'FC Pink',
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