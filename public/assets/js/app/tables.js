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
});