{{-- The file that cotains the scripts etc for the Development environment --}}

<!-- Get JQuery  -->
<!-- Moved ot head -->

<!-- Call Core Boostrap JS -->
{{ HTML::script('assets/js/bootstrap/bootstrap3.0.0.min.js') }}


<!-- Call Other Plugins -->
{{-- HTML::script('assets/js/bootstrap/bootstrap-switch.min.js') --}}
{{ HTML::script('assets/js/flippant/flippant.min.js') }}
{{ HTML::script('assets/js/bootstrap/summernote.min.js') }}


<!-- Call all datatables JS -->
<?php if(!isset($newDatatables)): ?>
    {{ HTML::script('assets/js/datatables/jquery.dataTables.min.js') }}
    {{ HTML::script('assets/js/datatables/dataTables.bootstrapPagination.js') }}
    {{ HTML::script('assets/js/datatables/dataTables.custom.js') }}
<?php else: ?>
    {{ HTML::script('assets/js/datatables/jquery.dataTables-1.10.2.min.js') }}
    {{ HTML::script('assets/js/app/tables.js') }}
    
    {{ HTML::style('//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.css') }}
    {{ HTML::script('//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js') }}
<?php endif; ?>

<!-- Call Other JS -->
{{ HTML::script('assets/js/app/app.js') }}
{{ HTML::script('assets/js/app/form.js') }}
{{ HTML::script('assets/js/app/modal.js') }}

<h4>Owner id: {{ $owner_id }}</h4>
<?php /* <h4>Current User</h4>
{{ dump($current_user) }}

@if(isset($record))
    <h4>Current record</h4>
    {{ dump($record) }}
@endif */ ?>