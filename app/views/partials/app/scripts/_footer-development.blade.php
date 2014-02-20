{{-- The file that cotains the scripts etc for the Development environment --}}

<!-- Call all Frameworks -->
    {{ HTML::script('assets/js/jquery/jquery2.0.0.min.js') }}

<!-- Call Core Boostrap JS -->
    {{ HTML::script('assets/js/bootstrap/bootstrap3.0.0.min.js') }}

<!-- Call Other Plugins -->
    {{-- HTML::script('assets/js/bootstrap/bootstrap-switch.min.js') --}}
    {{ HTML::script('assets/js/flippant/flippant.min.js') }}
    {{ HTML::script('assets/js/bootstrap/summernote.min.js') }}


<!-- Call all datatables JS -->
    {{ HTML::script('assets/js/datatables/jquery.dataTables.min.js') }}
    {{ HTML::script('assets/js/datatables/dataTables.bootstrapPagination.js') }}
    {{ HTML::script('assets/js/datatables/datatables.custom.js') }}

<!-- Call Other JS -->
    {{ HTML::script('assets/js/app/app.js') }}
    {{ HTML::script('assets/js/app/form.js') }}
    {{ HTML::script('assets/js/app/modal.js') }}
    {{-- HTML::script('assets/js/app/appAngular.js') --}}

{{ Debug::dump($config) }}
