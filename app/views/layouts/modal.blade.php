@section('error-message')
    @include('partials.common._message-ajax')
@show

@section('modal-body')
@show

{{ HTML::script('assets/js/app/form.js') }}

<script>
        $(document).on( 'click', '.add_row', function(e) {
        e.preventDefault();
        var row = null;

        //get table & rows
        var tableId = $(this).data('tableid');
        var table = $('table#'+tableId);
        var row = table.find("tbody tr:last").clone();

        //empty the inputs
        row.find('input').val('');

        //If there is a typahead the reinitilaise the typeahead
       
        //append ot the table as last row
        $('tr:last', table).after(row);
    });
</script>