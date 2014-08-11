$(function()
{
    $.extend($.fn.dataTable.defaults, {
        searching: false,
        processing: true
    });

    if (typeof window.dataTableConfig == "function")
        var table = $('.dataTable').DataTable(window.dataTableConfig());
    else
        var table = $('.dataTable').DataTable({});

    function triggerUrl ( url, $tr )
    {
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
    }

    $(document).on('click', '.dataTable tr.linked', function()
    {
        triggerUrl($(this).data().url, $(this));
    });
});