<?php namespace Dashboard\Composers;

use View, Auth;

/*
/*--------------------------------------------------------
/*    Define view composers here
/*--------------------------------------------------------
/*
/*  View composers allow us to bind certain data to a view 
/*  file.
 */


// Set up the global vars for the app */
    if ( Auth::user()->check() )
    {
        View::composer('*', 'Dashboard\Composers\AppComposer');
    }

/* Testing */
View::composer('partials.vars.test', function($view)
{
    $view->with('test1', 'hello');
});

/* Pass product array to the views that need it */
// View::composers(array(
//         // Apply product composer to these views
//     'ProductComposer' => array(),
// ));