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

<h4>Owner id: {{ $owner_id }}</h4>
<h4>Current User</h4>
{{ Debug::dump($current_user) }}

@if(isset($record))
    <h4>Current record</h4>
    {{ Debug::dump($record) }}
@endif
