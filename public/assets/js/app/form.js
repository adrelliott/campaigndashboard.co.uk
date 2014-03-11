$('form.ajax-form').on('submit', function(e) {
    e.preventDefault();
    
    //Set up vars
    var that = $(this),
    url = that.attr('action'),
    type = that.attr('ajax-method'),
    tableId = that.attr('table-id'),
    alertClass = that.attr('alert-class');  //This tells us what alert to show when modal closes

    //Serialise the data to allow for radio/checkboxes
    data = that.serialize();
    console.log('data:', data);
    console.log('url:', url);
    console.log('type:', type);

    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function(response) {
            //response is an array of the updated/created record
            //response_parsed = $.parseJSON(response);
            console.log(response);
        }
    });


    // Need some validation in here
    $('#modal').modal('hide')
    console.log('tableId:', tableId);
    $('table#'+tableId+'-table').dataTable().fnDraw();


    //Now show some success messages
    $('.form-failed').addClass('hide');   //Just in case we had an error before
    $('.form-success').removeClass('hide');
    window.setTimeout(function() {
        $('.form-success').addClass('hide');
    }, 1800);


    

    return false;
});

