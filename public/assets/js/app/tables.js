$(function()
{
    var dataTable;

    // Set up the defaults for our tables – these can and will be overridden
    // in each individual instance of window.dataTableConfig()
    $.extend($.fn.dataTable.defaults, {
        searching: false,
        processing: true
    });

    // Loop through each .dataTable. We'll expect a data-config parameter, which
    // will reference a function, allowing multiple datatables on the same page.
    $('.dataTable').each(function()
    {
        // Let a view specify a window.dataTableConfig['someFunction']() function, which, when returning
        // and object, allows us to configure the table on a per-tenant basis.
        if (typeof window.dataTableConfig == "object" && typeof window.dataTableConfig[$(this).attr('data-config')] == "function")
            dataTable = $(this).DataTable(window.dataTableConfig[$(this).attr('data-config')]());

        // Alternatively, just boot up a datatable instance using the defaults.
        else
            dataTable = $(this).DataTable({});
    });

    // When the user clicks on a row with the class .linked, go to the URL
    // specified in the row's data.url property, or load it up in a modal.
    // These properties are set inside the AJAX response in each row's
    // JSON – look for the DT_RowData parameter in the _row_json.php partials.
    $(document).on('click', '.dataTable tr.linked', function()
    {
        var url = $(this).data().url,
            $tr = $(this);

        // if ($tr.data('modal'))
        // {
        //     $('#modal').modal('show');

        //     $('.modal-body').html('')
        //         .addClass('loader')
        //         .load(url)
        //         .removeClass('loader');
        // }

        // else
            window.location.href = url;
    });

    // When we hide a modal we want to refresh the table, as the user very well
    // may have updated a row (and we want to reflect that in the table)
    $('#modal').on('hidden.bs.modal', function()
    {
        $this = $(this);

        setTimeout(function()
        {
            $this.data('attachedTable').draw();
        }, 500);
    });

    // If we're within a <div> that contains a datatable and we click on a show modal link,
    // we should store that table instance on the modal so we know what to refresh on close.
    $(document).on('click', '.withDataTable a[data-view="show_modal"], .withDataTable a.open-modal', function()
    {
        $('#modal').data('attachedTable', $(this).parents('.withDataTable').find('.dataTable').DataTable());
    });
});