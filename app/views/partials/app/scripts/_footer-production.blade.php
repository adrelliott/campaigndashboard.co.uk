{{-- The file that cotains the scripts etc for the Development environment --}}

<!-- Call all Frameworks -->
    {{-- HTML::script('assets/js/bootstrap/wysihtml5-0.3.0_rc2.min.js') --}}

<!-- Call Core Boostrap JS -->
{{-- HTML::script('assets/js/bootstrap/ui-bootstrap-tpls-0.10.0.min.js') --}}
{{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js') }}

    

<!-- Call all datatables JS -->
{{ HTML::script('assets/js/datatables/jquery.dataTables.min.js') }}
{{ HTML::script('assets/js/datatables/dataTables.bootstrapPagination.js') }}
{{ HTML::script('assets/js/datatables/dataTables.custom.js') }}

<!-- Call Other Plugins -->
{{-- HTML::script('assets/js/bootstrap/bootstrap-switch.min.js') --}}
{{ HTML::script('assets/js/flippant/flippant.min.js') }}
{{ HTML::script('assets/js/bootstrap/summernote.min.js') }}


<!-- Call Other JS -->
{{ HTML::script('assets/js/app/app.js') }}
{{ HTML::script('assets/js/app/form.js') }}
{{ HTML::script('assets/js/app/modal.js') }}
{{-- HTML::script('assets/js/app/appAngular.js') --}}

