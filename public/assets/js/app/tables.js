$(function()
{
    var dataTable;

    // Set up the defaults for our tables – these can and will be overridden
    // in each individual instance of window.dataTableConfig()
    $.extend($.fn.dataTable.defaults, {
        searching: false,
        processing: true
    });

    // Let a view specify a dataTableConfig() function, which, when returning
    // and object, allows us to configure the table on a per-tenant basis.
    if (typeof window.dataTableConfig == "function")
        dataTable = $('.dataTable').DataTable(window.dataTableConfig());

    // Alternatively, just boot up a datatable instance using the defaults.
    else
        dataTable = $('.dataTable').DataTable({});

    // When the user clicks on a row with the class .linked, go to the URL
    // specified in the row's data.url property, or load it up in a modal.
    // These properties are set inside the AJAX response in each row's
    // JSON – look for the DT_RowData parameter in the _row_json.php partials.
    $(document).on('click', '.dataTable tr.linked', function()
    {
        var url = $(this).data().url,
            $tr = $(this);

        if ($tr.data('modal'))
        {
            $('#modal').modal('show');

            $('.modal-body').html('')
                .addClass('loader')
                .load(url)
                .removeClass('loader');
        }

        else
            window.location.href = url;
    });

    // When we hide a modal we want to refresh the table, as the user very well
    // may have updated a row (and we want to reflect that in the table)
    $('#modal').on('hidden.bs.modal', function()
    {
        dataTable.draw();
    });
});