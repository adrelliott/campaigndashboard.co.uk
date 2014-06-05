<?php

/**
 * NOTE: We use MODULES in this app. Look in the app/modules folder for all routes
 */

Route::get('/c', function() {
    var_dump(App::environment());
    var_dump(Config::get('database.connections'));
    var_dump(Config::get('app.url'));
    var_dump(DB::connection()->getDatabaseName());
    var_dump(DB::getQueryLog());
    if(DB::connection()->getDatabaseName())
{
   var_dump( "conncted sucessfully to database ".DB::connection()->getDatabaseName() );
}
    return Config::get('database');
});

App::error(function(PDOException $exception)
{
    Log::error("Error connecting to database: ".$exception->getMessage());

    return "Error connecting to database";
});


Route::get('/e', function(){
    var_dump(App::environment());
    var_dump($_ENV);
    var_dump(getenv('test'));
});


Route::get('/', function(){
    return 'You shouldn\'t be here, should you?';
});

Route::get('/app', function(){
    return Redirect::to('app/dashboard');
});


