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


/* Set up the global vars for the app */
if ( Auth::check() ) 
    View::composer('*', 'Dashboard\Composers\AppComposer');

