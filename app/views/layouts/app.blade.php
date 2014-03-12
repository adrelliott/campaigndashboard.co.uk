<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="All your marketing in one place!">
        <meta name="author" content="Dallas Matthews Ltd">
        <link rel="shortcut icon" href="{{ URL::to('/assets/img/favicon.png') }}">

        <title>Dashboard</title>

        @include('partials.app.scripts._header-' . $environment)
        
    </head>

    <body>
        
        <!-- Navbar -->
        @include('partials.app._navbar')
        <!-- / Navbar -->

        <!-- Container -->
        <div class="container" >
            
            <!-- Top line -->
            <div class="row top-line">
                @section('top-line')
                    @include('partials.common._top-line')
                @show
            </div>
            <!-- / Top line -->
            
            <!-- Content -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @include('partials.common._message')
                    @section('content')
                        <h2>Add your content in the views/{route}/{method}.blade.php file</h2>
                    @show    
                </div>
            </div>
            <!-- / Content -->

        </div>
        <!-- / Container -->
    
        <!-- Footer -->
        <div class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                <p class="navbar-text text-muted credit">Copyright <a href="http://DallasMatthews.co.uk" target="_blank">Dallas Matthews Ltd</a> <?= date('Y'); ?></p>
            </div>
        </div>
        <!-- / Footer -->

        <!-- Modal -->
        @section('modal')
            @include('partials.common._modal', array('modalTitle' => ''))
        @show
        <!-- / Modal -->

        @include('partials.app.scripts._footer-' . $environment)
        
    </body>
</html>