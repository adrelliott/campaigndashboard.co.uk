$(function()
{
    if (typeof window.dataTableConfig == "function")
        var table = $('.dataTable').DataTable(window.dataTableConfig());
    else
        var table = $('.dataTable').DataTable({});
    
    console.log(table);
});