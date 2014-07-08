<?php

    /* uses the DB on the homestead Virtual machine */

    return array(
        'connections' => array(
            'mysql' => array(
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'campaigndashboard_development',
                'username'  => 'root',
                'password'  => 'root',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ),

        ),
    );
