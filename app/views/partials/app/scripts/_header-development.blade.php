{{-- The File for local development --}}

<!-- Get Bootstrap core CSS -->
{{ HTML::style('/assets/css/bootstrap/bootstrap.min.css') }}

<!-- Get other plugin CSS files -->
{{-- HTML::style('/assets/css/bootstrap/bootstrap-switch.min.css') --}}
{{ HTML::style('/assets/css/flippant/flippant.css') }}
{{ HTML::style('/assets/css/bootstrap/bootstrap3-summernote.css') }}
{{ HTML::style('/assets/css/bootstrap/summernote.css') }}

<!-- Include Font-awesome Upgraded from 3.2.1-->
{{ HTML::style('/assets/css/bootstrap/font-awesome4.0.0.css') }}

<!-- Custom styles for this template -->
{{ HTML::style('/assets/css/main.css') }}

<!-- Get AngularJS -->
{{-- HTML::script('assets/js/angularjs/angular1.2.13.min.js') --}}

<!-- Get JQuery -->
{{ HTML::script('assets/js/jquery/jquery2.0.0.min.js') }}


<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
        {{ HTML::script('/assets/js/others/html5shiv.js') }}  
      <script src="<?php// echo site_url('assets/bootstrap-3/js/respond.min.js'); ?>"></script>
<![endif]-->

<!-- PostcodeAnywhere stuff -->
<link rel="stylesheet" type="text/css" href="http://services.postcodeanywhere.co.uk/css/captureplus-2.10.min.css?key=xu56-tj37-eb64-kw34" />
<script type="text/javascript" src="http://services.postcodeanywhere.co.uk/js/captureplus-2.10.min.js?key=xu56-tj37-eb64-kw34"></script>