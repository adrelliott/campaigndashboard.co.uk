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
        'col2tabs' => ['tags'],
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
        '' => '--- Membership/Season Tickets ---',
        'adult Membership' => 'Adult Membership',
        'junior Membership' => 'Junior Membership',
        'season Ticket (Adult)' => 'Season Ticket (Adult)',
        'season Ticket (Junior) ' => 'Season Ticket (Junior)',
        'community Shares' => 'Community Shares',
        '' => '--- Draws &amp; Raffles ---',
        'treasureline' => 'TreasureLine',
        'holiday Draw' => 'Holiday Draw',
        '' => '--- Sponsorship ---',
        '127 Club' => '127 Club',
        'match Sponsor' => 'Match Sponsor',
        'matchball Sponsor' => 'Matchball Sponsor',
        'matchday Programme Sponsor' => 'Matchday Programme Sponsor',
        'programme Adverts' => 'Programme Adverts',
        'pitchside Hording' => 'Pitchside Hording',
        'pink Sponsorship' => 'Pink Sponsorship',
        'newsletter Sponsor' => 'Newsletter Sponsor',
        'community Sponsor' => 'Community Sponsor',
        'youth Team Sponsor' => 'Youth Team Sponsor',
        'women Team Sponsor' => 'Women Team Sponsor',
        'player Sponsor' => 'Player Sponsor',
        '' => '--- Others ---',
        'club Donations' => 'Club Donations',
        'df Donations' => 'DF Donations',
        'club Events' => 'Club Events',
        'merchanidise' => 'Merchanidise',
        'away Match Travel' => 'Away Match Travel',
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