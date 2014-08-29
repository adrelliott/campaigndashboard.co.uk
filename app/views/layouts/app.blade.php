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

        <!-- Set up Segment.io-->
        <script type="text/javascript">
            window.analytics=window.analytics||[],window.analytics.methods=["identify","group","track","page","pageview","alias","ready","on","once","off","trackLink","trackForm","trackClick","trackSubmit"],window.analytics.factory=function(t){return function(){var a=Array.prototype.slice.call(arguments);return a.unshift(t),window.analytics.push(a),window.analytics}};for(var i=0;i<window.analytics.methods.length;i++){var key=window.analytics.methods[i];window.analytics[key]=window.analytics.factory(key)}window.analytics.load=function(t){if(!document.getElementById("analytics-js")){var a=document.createElement("script");a.type="text/javascript",a.id="analytics-js",a.async=!0,a.src=("https:"===document.location.protocol?"https://":"http://")+"cdn.segment.io/analytics.js/v1/"+t+"/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n)}},window.analytics.SNIPPET_VERSION="2.0.9",
                window.analytics.load("k7w89uhktm");
            window.analytics.page();

            if (typeof window.dataTableConfig != "object")
                window.dataTableConfig = {}
        </script>
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

        @section('end_of_page')
            <!-- end of page -->
        @show
        
    </body>
</html>