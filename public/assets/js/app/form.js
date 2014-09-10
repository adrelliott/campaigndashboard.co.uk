$('form.ajax-form').submit(function(event) {
    
    //Set up vars
    // var that = $(this);
    var url = $(this).attr('ajax-url');
    var type = $(this).attr('ajax-method');

    //Serialise the data to allow for radio/checkboxes
    data = $(this).serialize();
    console.log(data);

    $.ajax({
        url: url,
        type: type,
        data: data,
        dataType : 'json'
    })
    
    // using the done promise callback
    .done(function(data) {

        // Clear any previous errors & messages
        $('.ajax-error').remove();
        $('.form-failed').addClass('hide');
        $('.has-error').removeClass('has-error');

        // log data to the console so we can see
        console.log(data);

        // Handle validation messages
        if ( ! data.success) {


            $('.form-errors').removeClass('hide');
            $('.ajax-error').remove();

            // Loop though each error and assign
            $.each(data.error.errors, function(index,error) {

                // add the error class to the wrap div to show the red error style
                $('#'+index).parent(".form-group").addClass('has-error');

                // add the actual error message under the input
                $('#'+index).parent(".form-group").append('<div class="help-block ajax-error"><i class="fa fa-exclamation-triangle"></i> ' + error + '</div>');

                // Add error to the message too
                $('ul.error-messages').append('<li class="ajax-error"><i class="fa fa-exclamation-triangle"></i> ' + error + '</li>');

            });

        }

        else if (data.success) {

            // Remove the default class of 'hide' from the success div and add to any others
            $('.form-success').removeClass('hide');
            $('.form-errors').addClass('hide');
            $('.form-failed').addClass('hide');

            $('.well').addClass('colorWellGreen');
            setTimeout(function()
            {
                $('.well').removeClass('colorWellGreen');
            }, 1500);
            // Now display the success message for 1 second then fade out
            $('.form-success').show(0).delay(1000).fadeOut('slow');



        }

        else {
            $('.form-failed').removeClass('hide');
            $('.form-errors').addClass('hide');
        }
    })
    // In the event of a server issue or no response, we'll show a failure message
    .fail(function(data) {
         $('.form-failed').removeClass('hide');
            $('.form-errors').addClass('hide');
    });

    event.preventDefault();

});

