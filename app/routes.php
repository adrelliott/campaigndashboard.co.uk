<?php

/**
 * NOTE: We use MODULES in this app. Look in the app/modules folder for all routes
 */

Route::get('/c', function() {
    dump(Config::get('database.connections'));
    dump( Config::get('app.url') );
    echo '<br>Env: ' . App::environment();
    dump(DB::connection()->getDatabaseName());




//    $retval .= '<br>url: ' . Config::get('app.url');
//    $retval .= '<br>DB=: ' . ;

//    if ( App::environment() == 'production' ) return;


//    var_dump(DB::connection()->getDatabaseName());
//    var_dump(DB::getQueryLog());
    if( DB::connection()->getDatabaseName()  )
{
   var_dump( "conncted sucessfully to database");
    dump(DB::connection());

}
//    return $retval;

});

// App::error(function(PDOException $exception)
// {
//     Log::error("Database error: ".$exception->getMessage());

//     if (App::environment() == 'production')
//     {
//         return "Database error - @todo Show more useful page";
//     }
//     else
//     {
//         throw $exception;
//     }
// });

Route::get('/e', function(){
    var_dump(App::environment());
    var_dump($_ENV);
    var_dump(getenv('db_username'));

    $env = $app->detectEnvironment(function () {
        $environment = getenv('ENV_NAME');
        if (strlen($environment) == 0) {
            if (strpos(__DIR__, '/home/forge/staging.mysite.com') === 0) {
                $environment = 'staging';
            } elseif (strpos(__DIR__, '/home/forge/mysite.com') === 0) {
                $environment = 'production';
            }
        }
        if (strlen($environment) == 0) {
            $environment = 'development';
        }

        return $environment;
    });
});


Route::get('/', function(){
    return 'You shouldn\'t be here, should you?';
});

Route::get('/app', function(){
    return Redirect::to('app/dashboard');
});


