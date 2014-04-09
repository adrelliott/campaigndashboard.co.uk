{{-- The File for local development --}}

<!-- Get Bootstrap core CSS -->
{{-- HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css') --}}
{{ HTML::style('/assets/css/bootstrap/bootstrap.min.css') }}

<!-- Get other plugin CSS files -->
{{-- HTML::style('/assets/css/bootstrap/bootstrap-switch.min.css') --}}
{{ HTML::style('/assets/css/flippant/flippant.css') }}
{{ HTML::style('/assets/css/bootstrap/bootstrap3-summernote.css') }}
{{ HTML::style('/assets/css/bootstrap/summernote.css') }}

<!-- Include Font-awesome Upgraded from 3.2.1-->
{{-- HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css') --}}
{{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css') }}

<!-- Custom styles for this template -->
{{ HTML::style('/assets/css/main.css') }}


<!-- Get JQuery -->
{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js') }}


{{-- HTML::script('//ajax.googleapis.com/ajax/libs/angularjs/1.2.13/angular.min.js') --}}

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
        {{ HTML::script('/assets/js/others/html5shiv.js') }}  
      <script src="<?php// echo site_url('assets/bootstrap-3/js/respond.min.js'); ?>"></script>
<![endif]-->

<!-- PostcodeAnywhere stuff -->
<link rel="stylesheet" type="text/css" href="http://services.postcodeanywhere.co.uk/css/captureplus-2.10.min.css?key=xu56-tj37-eb64-kw34" />
<script type="text/javascript" src="http://services.postcodeanywhere.co.uk/js/captureplus-2.10.min.js?key=xu56-tj37-eb64-kw34"></script>